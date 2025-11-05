<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Shift;
use App\Models\Time;
use Carbon\Carbon;

class FillMissingAttendance extends Command
{
    protected $signature = 'attendance:fill-missing';
    protected $description = 'Fill missing attendance records with Absent or Off based on shift days';

    public function handle()
    {
        $timezone = 'Asia/Karachi';
        $users = User::with('shift')->where('role_id',2)->get();

        foreach ($users as $user) {
            $shift = Shift::find($user->shift_id);

            if (!$shift) {
                $this->warn("⚠️ User {$user->id} has no shift assigned, skipping.");
                continue;
            }

            $shiftDays = is_array($shift->days)
                ? $shift->days
                : json_decode($shift->days, true);

            $shiftDays = (array) $shiftDays;

            $firstRecord = Time::where('user_id', $user->id)
                ->orderBy('time_in', 'asc')
                ->first();

            $lastRecord = Time::where('user_id', $user->id)
                ->orderBy('time_in', 'desc')
                ->first();

            if (!$firstRecord || !$lastRecord) {
                continue;
            }

            $startDate = Carbon::parse($firstRecord->created_at)->startOfDay();
            $endDate = Carbon::parse($lastRecord->created_at)->startOfDay();
            $today = Carbon::today($timezone);

            if ($endDate->lt($today)) {
                $endDate = $today->copy()->subDay(); // stop at yesterday
            }

            $date = $startDate->copy();
            while ($date->lte($endDate)) {
                $exists = Time::where('user_id', $user->id)
                    ->whereDate('time_in', $date)
                    ->exists();

                if (!$exists) {
                    $dayName = $date->format('l');
                    $isShiftDay = in_array($dayName, $shiftDays);

                    $dateTime = Carbon::parse($date->format('Y-m-d') . ' 00:00:00', $timezone);

                    Time::create([
                        'user_id' => $user->id,
                        'time_in' => $dateTime,
                        'time_out' => $dateTime,
                        'status' => $isShiftDay ? 'Absent' : 'Off',
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);

                    $this->info("📅 {$date->toDateString()} → " . ($isShiftDay ? 'Absent' : 'Off') . " (User ID: {$user->id})");
                }

                $date->addDay();
            }
        }

        $this->info('✅ Missing attendance records filled with proper date & time!');
    }
}
