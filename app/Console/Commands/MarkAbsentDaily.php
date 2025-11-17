<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shift;
use App\Models\Time;

class MarkAbsentDaily extends Command
{
    protected $signature = 'attendance:mark-absent-daily';
    protected $description = 'Mark users Absent after shift ends if they did not time_in today (multi-tenant)';

    public function handle()
    {
        $timezone = 'Asia/Karachi';
        $today = Carbon::today($timezone);
        $todayName = $today->format('l'); // Monday, Tuesday, etc.

        $tenants = DB::table('tenants')->get();

        if ($tenants->isEmpty()) {
            $this->info('No tenants found.');
            return 0;
        }

        foreach ($tenants as $tenant) {

            $this->info("Processing tenant: {$tenant->database_name}");

            // Configure tenant DB
            Config::set('database.connections.tenant.database', $tenant->database_name);
            Config::set('database.connections.tenant.username', env('DB_USERNAME'));
            Config::set('database.connections.tenant.password', env('DB_PASSWORD'));

            DB::purge('tenant');
            DB::reconnect('tenant');

            $userModel = new User();
            $userModel->setConnection('tenant');

            // Process users in chunks
            $userModel->where('role_id', 2)->chunk(200, function ($users) use ($today, $todayName, $timezone, $tenant) {

                foreach ($users as $user) {

                    $shift = (new Shift)->setConnection('tenant')->find($user->shift_id);

                    if (!$shift) {
                        $this->warn(" No shift for User {$user->id}, skipping.");
                        continue;
                    }

                    // Normalize shift days
                    $shiftDays = is_array($shift->days) ? $shift->days : json_decode($shift->days, true);
                    $shiftDays = (array)$shiftDays;

                    // If today is not one of the shift days → skip
                    if (!in_array($todayName, $shiftDays)) {
                        continue;
                    }

                    // Build shift start / end datetime
                    $shiftStart = Carbon::parse($today->format('Y-m-d') . ' ' . $shift->time_from, $timezone);
                    $shiftEnd   = Carbon::parse($today->format('Y-m-d') . ' ' . $shift->time_to, $timezone);

                    // Handle overnight shifts (ex: 20:00 → 05:00)
                    if ($shiftEnd->lessThan($shiftStart)) {
                        $shiftEnd->addDay();
                    }

                    // If current time < shift end → don't mark absent yet
                    if (Carbon::now($timezone)->lt($shiftEnd)) {
                        continue;
                    }

                    // Check if user already did time_in today
                    $timeModel = new Time();
                    $timeModel->setConnection('tenant');

                    $exists = $timeModel
                        ->where('user_id', $user->id)
                        ->whereDate('time_in', $today)
                        ->exists();

                    if ($exists) {
                        continue;
                    }

                    // Create ABSENT record
                    $dateTime = Carbon::parse($today->format('Y-m-d') . ' 00:00:00', $timezone);

                    DB::connection('tenant')->transaction(function () use ($timeModel, $user, $dateTime, $today) {
                        $timeModel->create([
                            'user_id' => $user->id,
                            'time_in' => $dateTime,
                            'time_out' => $dateTime,
                            'status' => 'Absent',
                            'created_at' => $today->copy()->startOfDay(),
                            'updated_at' => $today->copy()->startOfDay(),
                        ]);
                    });

                    echo "Marked Absent → Tenant: {$tenant->database_name}, User: {$user->id}, Date: {$today->toDateString()}\n";
                }
            });

            $this->info("✔ Finished tenant: {$tenant->database_name}");
        }

        $this->info("🎉 Daily Absent Marking Completed Successfully");
        return 0;
    }
}
