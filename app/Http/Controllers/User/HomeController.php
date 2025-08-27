<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breaks;
use App\Models\Time;
use App\Models\Shift;
use App\Models\Department;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request, $id)
    {


            // Get current month start and end
    $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
    $endOfMonth = Carbon::now()->endOfMonth()->toDateString();

    // Fetch current month attendance data for the user
    $attendances = Time::where('user_id', $id)
        ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->get();

    // Count summaries
    $totalDays = $attendances->count();
    $totalCompleted = $attendances->where('status', 'Completed')->count();
    $totalHalf = $attendances->where('status', 'Half')->count();
    $totalShort = $attendances->where('status', 'Short')->count();
    $totalAbsent = $attendances->where('status', 'Absent')->count();
    $totalLate = $attendances->where('late_status', 1)->count();
    $totalPresent = $totalDays - $totalAbsent;





        $currentTotalTime='';
        $remainingTime = '';
        $currentBreakTime = '';
        $message = "";
        $Time = '';

        
    

        $user = User::where('id',$id)->first();
        $shiftk = Shift::where('id',$user->shift_id)->first();
        $department = Department::where('id',$user->jobInfo->department_id)->first();
        $location = Location::where('id',$user->location_id)->first();

        $shift = Carbon::parse($shiftk->time_to)->diff(Carbon::parse($shiftk->time_from));
        $shift = Carbon::parse($shift->h.':'.$shift->i.':'.$shift->s);

        // $TotalBreakTime = Carbon::parse('00:00:00');
        // if($all_breaks)
        // {
        //     foreach($all_breaks as $break)
        //     {
        //         $start = Carbon::parse($break->time_in);
        //         $end = Carbon::parse($break->time_out);
    
    
        //         $diff = $end->diff($start);
        //         $hours = $diff->h;
        //         $minutes = $diff->i;
        //         $seconds = $diff->s;
    
    
        //         $TotalBreakTime = $TotalBreakTime->addHours($hours)->addMinutes($minutes)->addSeconds($seconds);
        //     }
        // }

            
        

        $Time = Time::where('user_id',$id)->whereDate('created_at', Carbon::today('Asia/Karachi'))->where('time_out',null)->first();
        if($Time)
        {


            $Time_in = Carbon::parse($Time->time_in)->toTimeString();
        
            $Time_now = Carbon::now('Asia/Karachi')->toTimeString();
            $Time_now = Carbon::parse($Time_now);
            
            $currentTotalTime = $Time_now->diff($Time_in);
    
            
            $hour = $currentTotalTime->h;
            $minute = $currentTotalTime->i;
            $second = $currentTotalTime->s;
    
            $totalTime = Carbon::parse($hour.':'.$minute.':'.$second);
            $ShifFrom = Carbon::parse($shiftk->time_from);
            $ShifTo = Carbon::parse($shiftk->time_to);
            if ($ShifTo->lt($ShifFrom)) {
                $ShifTo = $ShifTo->addDay();
            }
            
            $remainingTime = Carbon::parse($ShifTo)->diff($Time_now);




            // if($TotalBreakTime)
            // {
            //     $totalTime = $totalTime->subHours($TotalBreakTime->hour)->subMinutes($TotalBreakTime->minute)->subSeconds($TotalBreakTime->second);
            // }
    
    
            
           if($totalTime->isAfter($shift))
           {
                $message = "Shift Completed Successfully!";

                $remainingTime = '';
                $currentBreakTime = '';
           }
        }

        $ShiftN = Shift::where('id',$user->shift_id)->first();

        $timeFrom = Carbon::parse($ShiftN->time_from);
        $timeTo = Carbon::parse($ShiftN->time_to);

        if ($timeTo->lessThan($timeFrom)) {
            $timeTo->addDay();
        }


        $totalShiftHours = $timeTo->diffInMinutes($timeFrom);
        $totalShiftHours = $totalShiftHours / 60;
        $totalShiftHours = number_format($totalShiftHours, 2);

    

        $response = [
            'status'=>true,
            "TotalTime" => $currentTotalTime ? sprintf('%02d:%02d:%02d', $currentTotalTime->h, $currentTotalTime->i, $currentTotalTime->s) : null,
            "RemainingTime"=>$remainingTime,
            'ShiftName'=>$ShiftN,
            'department'=>$department,
            'location'=>$location,
            "attendence"=>$Time,
            "message" => $message,
            'total_working_days' => $totalDays,
            'total_present' => $totalPresent,
            'total_absent' => $totalAbsent,
            'total_lates' => $totalLate,
            'total_half_days' => $totalHalf,
            'total_short_days' => $totalShort,
            'total_completed' => $totalCompleted,
        ];
        return response($response, 200);   







    }
}
