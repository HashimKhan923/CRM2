<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breaks;
use App\Models\Time;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request, $id)
    {
        $currentTotalTime='';
        $remainingTime = '';
        $currentBreakTime = '';
        $message = "";
        $Time = '';

        
    

        $user = User::where('id',$id)->first();
        $shiftk = Shift::where('id',$user->shift_id)->first();

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

    

    //    if ($request->wantsJson()) {
        $response = ['status'=>true,"TotalTime"=>$currentTotalTime->toTimeString(),"RemainingTime"=>$remainingTime,'ShiftName'=>$ShiftN,"message" => $message];
        return response($response, 200);   
    //  }

    // return view('user.index', compact('currentTotalTime','remainingTime','ShiftN','totalShiftHours','message','Time')); 






    }
}
