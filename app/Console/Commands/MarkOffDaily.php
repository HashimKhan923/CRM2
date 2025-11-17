<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Time;

class MarkOffDaily extends Command
{
    protected $signature = 'attendance:mark-off-daily';
    protected $description = 'Mark OFF status for users when today is not a shift day (multi-tenant)';

    public function handle()
    {
        $timezone = 'Asia/Karachi';
        $today = Carbon::today($timezone);
        $todayName = $today->format('l');   // e.g. Sunday, Monday

        // Fetch all tenants
        $tenants = DB::table('tenants')->get();

        if ($tenants->isEmpty()) {
            $this->info('No tenants found.');
            return 0;
        }

        foreach ($tenants as $tenant) {

            $this->info("Processing tenant: {$tenant->database_name}");

            // Configure tenant DB connection
            Config::set('database.connections.tenant.database', $tenant->database_name);
            Config::set('database.connections.tenant.username', env('DB_USERNAME'));
            Config::set('database.connections.tenant.password', env('DB_PASSWORD'));

            DB::purge('tenant');
            DB::reconnect('tenant');

            // Fetch employees in chunks
            (new User)->setConnection('tenant')
                ->where('role_id', 2)
                ->chunk(200, function ($users) use ($today, $todayName, $timezone, $tenant) {

                    foreach ($users as $user) {

                        // Load shift
                        $shift = (new Shift)->setConnection('tenant')->find($user->shift_id);

                        // If no shift -> skip
                        if (!$shift) {
                            continue;
                        }

                        // Normalize shift days array
                        $shiftDays = is_array($shift->days)
                            ? $shift->days
                            : json_decode($shift->days, true);

                        $shiftDays = (array) $shiftDays;

                        // Today is not a shift day --> mark OFF
                        if (in_array($todayName, $shiftDays)) {
                            continue; // today IS a shift day, skip
                        }

                        // Check if any record exists for today
                        $timeModel = new Time();
                        $timeModel->setConnection('tenant');

                        $exists = $timeModel
                            ->where('user_id', $user->id)
                            ->whereDate('time_in', $today)
                            ->exists();

                        if ($exists) {
                            continue; // record already exists — no duplicate
                        }

                        // Create OFF record
                        $dateTime = Carbon::parse($today->format('Y-m-d') . ' 00:00:00', $timezone);

                        DB::connection('tenant')->transaction(function () use ($timeModel, $user, $dateTime, $today) {
                            $timeModel->create([
                                'user_id' => $user->id,
                                'time_in' => $dateTime,
                                'time_out' => $dateTime,
                                'status' => 'Off',
                                'created_at' => $today->copy()->startOfDay(),
                                'updated_at' => $today->copy()->startOfDay(),
                            ]);
                        });

                        echo "Marked OFF → Tenant: {$user->id}, User: {$user->id}, {$today->toDateString()}\n";
                    }
                });

            $this->info("✔ Finished: {$tenant->database_name}");
        }

        $this->info("🎉 OFF Marking Completed Successfully");
        return 0;
    }
}
