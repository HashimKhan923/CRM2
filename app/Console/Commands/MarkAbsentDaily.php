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
    protected $description = 'Daily batch: mark users Absent if they did not time_in for today and today is their shift day (multi-tenant).';

    public function handle()
    {
        $timezone = 'Asia/Karachi';
        $today = Carbon::today($timezone);
        $todayName = $today->format('l'); // e.g., "Monday"

        // Get tenants list from main DB (assumes tenants table exists on main connection)
        $tenants = DB::table('tenants')->get();

        if ($tenants->isEmpty()) {
            $this->info('No tenants found. Exiting.');
            return 0;
        }

        foreach ($tenants as $tenant) {
            $this->info("Processing tenant: {$tenant->database_name}");

            // Configure tenant DB connection (update connection credentials if required)
            Config::set('database.connections.tenant.database', $tenant->database_name);
            Config::set('database.connections.tenant.username', env('DB_USERNAME'));
            Config::set('database.connections.tenant.password', env('DB_PASSWORD'));

            // Reconnect to tenant (clear any previous connection)
            DB::purge('tenant');
            DB::reconnect('tenant');

            // Use model instances with tenant connection to avoid global model changes
            $userModel = new User();
            $userModel->setConnection('tenant');

            // chunk users to avoid memory issues, only role_id = 2 (employees)
            $userModel->where('role_id', 2)->chunk(200, function ($users) use ($today, $todayName, $timezone, $tenant) {
                foreach ($users as $user) {
                    // load shift from tenant DB
                    $shift = (new Shift)->setConnection('tenant')->find($user->shift_id);

                    // if no shift assigned, skip
                    if (!$shift) {
                        $this->warn("  [Tenant: {$tenant->database_name}] User {$user->id} has no shift assigned, skipping.");
                        continue;
                    }

                    // normalize shift days (assumes shift->days stored as JSON array or array)
                    $shiftDays = is_array($shift->days) ? $shift->days : json_decode($shift->days, true);
                    $shiftDays = (array) $shiftDays;

                    // If today is not a shift day, skip
                    if (!in_array($todayName, $shiftDays)) {
                        continue;
                    }

                    // Check if there's an existing time_in record for today
                    $timeModel = new Time();
                    $timeModel->setConnection('tenant');

                    $exists = $timeModel
                        ->where('user_id', $user->id)
                        ->whereDate('time_in', $today)
                        ->exists();

                    if ($exists) {
                        // user already timed in today
                        continue;
                    }

                    // Create Absent record with full datetime YYYY-MM-DD 00:00:00
                    $dateTime = Carbon::parse($today->format('Y-m-d') . ' 00:00:00', $timezone);

                    // Use transaction for safety
                    DB::connection('tenant')->transaction(function () use ($timeModel, $user, $dateTime, $today, $tenant) {
                        $timeModel->create([
                            'user_id' => $user->id,
                            'time_in' => $dateTime,
                            'time_out' => $dateTime,
                            'status' => 'Absent',
                            'created_at' => $today->copy()->startOfDay(),
                            'updated_at' => $today->copy()->startOfDay(),
                        ]);
                    });

                    $this->info("  Marked Absent: Tenant [{$tenant->database_name}] - User ID {$user->id} - Date {$today->toDateString()}");
                }
            });

            $this->info("Finished tenant: {$tenant->database_name}");
        }

        $this->info('All tenants processed. Daily absent marking complete.');
        return 0;
    }
}
