<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\User;
use App\Models\Shift;
use App\Models\JobInfo;
use App\Models\Department;
use Carbon\Carbon;
use App\Models\Location;
use App\Services\GeolocationService;


class AttendenceController extends Controller
{

    protected $geolocationService;

    public function __construct(GeolocationService $geolocationService)
    {
        $this->geolocationService = $geolocationService;
    }

    public function index(Request $request, $id)
    {
        $attendences = Time::with(['user']) // Load related breaks
        ->whereDate('created_at', Carbon::today())
        ->where('user_id',$id)
        ->get()
        ->map(function ($attendance) {
            $clockIn = Carbon::parse($attendance->time_in);
            $clockOut = Carbon::parse($attendance->time_out);

            // Calculate total worked minutes
            $totalWorkedMinutes = $clockOut->diffInMinutes($clockIn);

            // Get total break time in minutes
            $totalBreakMinutes = $attendance->breaks->sum(function ($break) {
                if ($break->time_in && $break->time_out) {
                    return Carbon::parse($break->time_out)->diffInMinutes(Carbon::parse($break->time_in));
                }
                return 0;
            });

            // Calculate net worked minutes
            $netWorkedMinutes = max($totalWorkedMinutes - $totalBreakMinutes, 0);

            // Convert to hours & minutes format
            $attendance->net_worked_hours = floor($netWorkedMinutes / 60) . 'h ' . ($netWorkedMinutes % 60) . 'm';

            return $attendance;
        });

        // if ($request->wantsJson()) {
            return response()->json(['attendences'=>$attendences]);  
        // }

        // return view('user.attendences.index', compact('attendences')); 
    }

public function detail($id)
{
    $attendance = Time::with(['user', 'breaks'])->find($id);

    if (!$attendance) {
        return response()->json(['message' => 'Attendance not found'], 404);
    }

    $clockIn = Carbon::parse($attendance->time_in);
    $clockOut = Carbon::parse($attendance->time_out);

    $totalWorkedMinutes = $clockOut->diffInMinutes($clockIn);

    $totalBreakMinutes = $attendance->breaks->sum(function ($break) {
        if ($break->time_in && $break->time_out) {
            return Carbon::parse($break->time_out)->diffInMinutes(Carbon::parse($break->time_in));
        }
        return 0;
    });

    $netWorkedMinutes = max($totalWorkedMinutes - $totalBreakMinutes, 0);
    $attendance->net_worked_hours = floor($netWorkedMinutes / 60) . 'h ' . ($netWorkedMinutes % 60) . 'm';

    return response()->json(['attendance' => $attendance]);
}

    public function search(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->startOfDay();
        $to_date = Carbon::parse($request->to_date)->endOfDay();


        $attendences = Time::with(['user']) // Load related breaks
        ->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('user_id',auth()->user()->id)
        ->get()
        ->map(function ($attendance) {
            $clockIn = Carbon::parse($attendance->time_in);
            $clockOut = Carbon::parse($attendance->time_out);

            // Calculate total worked minutes
            $totalWorkedMinutes = $clockOut->diffInMinutes($clockIn);

            // Get total break time in minutes
            $totalBreakMinutes = $attendance->breaks->sum(function ($break) {
                if ($break->time_in && $break->time_out) {
                    return Carbon::parse($break->time_out)->diffInMinutes(Carbon::parse($break->time_in));
                }
                return 0;
            });

            // Calculate net worked minutes
            $netWorkedMinutes = max($totalWorkedMinutes - $totalBreakMinutes, 0);

            // Convert to hours & minutes format
            $attendance->net_worked_hours = floor($netWorkedMinutes / 60) . 'h ' . ($netWorkedMinutes % 60) . 'm';

            return $attendance;
        });

        // if ($request->wantsJson()) {
            return response()->json(['attendences'=>$attendences]);  
        // }

        // return view('user.attendences.index', compact('attendences')); 
    }

    public function time_in($location_id,$user_id)
    {

        $check_user = User::where('id', $user_id)->first();
        $check_shift = Shift::where('id', $check_user->shift_id)->first();
        $department = JobInfo::where('user_id',$user_id)->first();
        $department = Department::where('id',$department->department_id)->first();
        

        $ShiftTimeIn = Carbon::parse($check_shift->time_from);
        $ShiftTimeOut = Carbon::parse($check_shift->time_to);
        $ShiftTimeIn = $ShiftTimeIn->toTimeString();
        $ShiftTimeOut = $ShiftTimeOut->toTimeString();
        $ShiftTimeIn = Carbon::parse($ShiftTimeIn);
        $ShiftTimeOut = Carbon::parse($ShiftTimeOut);
    
        $CurrentTime = Carbon::now('Asia/Karachi');
        $CurrentTime = $CurrentTime->toTimeString();
        $CurrentTime = Carbon::parse($CurrentTime);


            if ($ShiftTimeOut->lt($ShiftTimeIn)) {
                $ShiftTimeOut->addDay();
            }

            $currentDay = Carbon::now('Asia/Karachi')->format('l');
            $shiftDays = $check_shift->days; 

            if (!in_array($currentDay, $shiftDays)) {
                return response(['status' => false, 'message' => 'Today is your off day'], 200);
            }

            // if($check_user->location_id == $location_id)
            // {

                if ($CurrentTime->gt($ShiftTimeIn) && $CurrentTime->lt($ShiftTimeOut)) {
                $check = Time::where('user_id', $user_id)->whereDate('created_at', Carbon::today('Asia/Karachi'))->first();
        
                if (!$check) {

                        $new = new Time();
                        $new->user_id = $user_id;
                        $new->time_in = Carbon::now('Asia/Karachi');
            
                        // Check if the user is late
                        if ($CurrentTime->greaterThan($ShiftTimeIn->copy()->addMinutes($check_shift->grace_period))) {
                            $new->late_status = 1;
                        }
            
                        $new->save();
        
                 
                        $response = ['status' => true, "message" => "Attendance Marked Successfully!"];
                        return response($response, 200);

        
                } else {
               
                        $response = ['status' => false, "message" => "Your Attendance is Already Marked!"];
                        return response($response, 200);
                    
        
                }
        
                } else {
                  
                        $response = ['status' => false, "message" => "Your shift has not started yet!"];
                        return response($response, 200);
                    

                }

            // }
            // else
            // {
            //         $response = ['status' => true, "message" => "You are not in location!"];
            //         return response($response, 200);
            // }
        





    
     
    }

    

    public function time_out(Request $request)
    {
        $user = User::find($request->user_id);
        $shift = Shift::find($user->shift_id);
        
        $shiftStart = Carbon::parse($shift->time_from);
        $shiftEnd = Carbon::parse($shift->time_to);
        
        if ($shiftEnd->lessThan($shiftStart)) {
            $shiftEnd->addDay();
        }
    
        $totalShiftMinutes = $shiftEnd->diffInMinutes($shiftStart);
    
        $timeRecord = Time::where('user_id', $user_id)
                          ->whereDate('created_at', Carbon::today('Asia/Karachi'))
                          ->first();
    
        if (!$timeRecord) {
            return response()->json(['status' => false, 'message' => 'No time in record found for today'], 400);
        }
    
        $timeRecord->time_out = Carbon::now('Asia/Karachi');
        if ($request->has('over_time')) {
            $timeRecord->over_time = $request->over_time;
        }
        $timeRecord->save();
    
        $timeIn = Carbon::parse($timeRecord->time_in, 'Asia/Karachi');
        $timeOut = Carbon::parse($timeRecord->time_out, 'Asia/Karachi');
    
        if ($timeOut->lessThan($timeIn)) {
            $timeOut->addDay();
        }
    
        $totalAttendanceMinutes = $timeOut->diffInMinutes($timeIn);
    
        if ($totalAttendanceMinutes >= $totalShiftMinutes) {
            $timeRecord->status = 'Completed';
        } elseif ($totalAttendanceMinutes >= $totalShiftMinutes / 2) {
            $timeRecord->status = 'Half';
        } elseif ($totalAttendanceMinutes >= $totalShiftMinutes / 4) {
            $timeRecord->status = 'Short';
        } else {
            $timeRecord->status = 'Absent';
        }
        
        $timeRecord->save();
    
        // if ($request->wantsJson()) {
            return response()->json(['status' => true, 'message' => 'Time out Successfully!'], 200);
        // }
    
        // session()->flash('success', 'Time out Successfully!');
        // return redirect()->back();
    }
    
    
    
    
    
    
}
