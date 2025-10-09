<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;
use App\Models\User;
use App\Models\Shift;
use Carbon\Carbon;

class AttendenceController extends Controller
{
    public function index(Request $request)
    {

        $attendences = Time::with(['user.personalInfo']) // Load related breaks
            ->whereDate('created_at', Carbon::today())
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


        $users = User::with('personalInfo')->where('role_id',2)->get();

        if ($request->wantsJson()) {
            return response()->json(['attendences'=>$attendences,'users'=>$users]);  
        }

        // return $attendences;

        return view('admin.attendences.index', compact('attendences')); 
    }

    public function detail($id)
    {
        $attendences = Time::with(['user','breaks']) // Load related breaks
        ->where('id',$id)   
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
        return response()->json(['attendence'=>$attendence]);
    }

    public function create(Request $request)
    {
        $check_user = User::where('id', $request->user_id)->first();
        $check_shift = Shift::where('id', $check_user->shift_id)->first();

        


        $ShiftTimeIn = Carbon::parse($check_shift->time_from);
        $ShiftTimeOut = Carbon::parse($check_shift->time_to);
        $ShiftTimeIn = $ShiftTimeIn->toTimeString();
        $ShiftTimeOut = $ShiftTimeOut->toTimeString();
        $ShiftTimeIn = Carbon::parse($ShiftTimeIn);
        $ShiftTimeOut = Carbon::parse($ShiftTimeOut);
    

        $TimeIn = Carbon::parse($request->time_in);





    
        if ($ShiftTimeOut->lt($ShiftTimeIn)) {
            $ShiftTimeOut->addDay();
        }
    
      

                $new = new Time();
                $new->user_id = $request->user_id;
                $new->time_in = $TimeIn;
    
                // Check if the user is late
                if ($TimeIn->greaterThan($ShiftTimeIn->copy()->addMinutes($check_shift->grace_period))) {
                    $new->late_status = 1;
                }
    
                $new->save();


                if($request->time_out)
                {

                    $shiftStart = Carbon::parse($check_shift->time_from);
                    $shiftEnd = Carbon::parse($check_shift->time_to);
                    

                    if ($shiftEnd->lessThan($shiftStart)) {
                        $shiftEnd->addDay();
                    }
                
                    $totalShiftMinutes = $shiftEnd->diffInMinutes($shiftStart);


                    $TimeOut = Carbon::parse($request->time_out);
                    $new->time_out = $TimeOut;
                    $new->save();

                    $timeIn = Carbon::parse($new->time_in, 'Asia/Karachi');
                    $timeOut = Carbon::parse($new->time_out, 'Asia/Karachi');

                    if ($timeOut->lessThan($timeIn)) {
                        $timeOut->addDay();
                    }
                
                    $totalAttendanceMinutes = $timeOut->diffInMinutes($timeIn);
                
                    if ($totalAttendanceMinutes >= $totalShiftMinutes) {
                        $new->status = 'Completed';
                    } elseif ($totalAttendanceMinutes >= $totalShiftMinutes / 2) {
                        $new->status = 'Half';
                    } elseif ($totalAttendanceMinutes >= $totalShiftMinutes / 4) {
                        $new->status = 'Short';
                    } else {
                        $new->status = 'Absent';
                    }
                    
                    $new->save();
                }

    
                if ($request->wantsJson()) {
                    $response = ['status' => true, "message" => "Attendance Marked Successfully!"];
                    return response($response, 200);
                }
    
                session()->flash('success', 'Attendance Marked Successfully!');
                return redirect()->back();
    

    }

    public function update(Request $request)
    {
        $check_user = User::where('id', $request->user_id)->first();
        $check_shift = Shift::where('id', $check_user->shift_id)->first();

        


        $ShiftTimeIn = Carbon::parse($check_shift->time_from);
        $ShiftTimeOut = Carbon::parse($check_shift->time_to);
        $ShiftTimeIn = $ShiftTimeIn->toTimeString();
        $ShiftTimeOut = $ShiftTimeOut->toTimeString();
        $ShiftTimeIn = Carbon::parse($ShiftTimeIn);
        $ShiftTimeOut = Carbon::parse($ShiftTimeOut);
    

        $TimeIn = Carbon::parse($request->time_in);





    
        if ($ShiftTimeOut->lt($ShiftTimeIn)) {
            $ShiftTimeOut->addDay();
        }
    
      

                $new = Time::where('id',$request->attendance_id)->first();
                $new->user_id = $request->user_id;
                $new->time_in = $TimeIn;
    
                // Check if the user is late
                if ($TimeIn->greaterThan($ShiftTimeIn->copy()->addMinutes($check_shift->grace_period))) {
                    $new->late_status = 1;
                }
                else
                {
                    $new->late_status = 0;

                }
    
                $new->save();


                if($request->time_out)
                {

                    $shiftStart = Carbon::parse($check_shift->time_from);
                    $shiftEnd = Carbon::parse($check_shift->time_to);
                    

                    if ($shiftEnd->lessThan($shiftStart)) {
                        $shiftEnd->addDay();
                    }
                
                    $totalShiftMinutes = $shiftEnd->diffInMinutes($shiftStart);


                    $TimeOut = Carbon::parse($request->time_out);
                    $new->time_out = $TimeOut;
                    $new->save();

                    $timeIn = Carbon::parse($new->time_in, 'Asia/Karachi');
                    $timeOut = Carbon::parse($new->time_out, 'Asia/Karachi');

                    if ($timeOut->lessThan($timeIn)) {
                        $timeOut->addDay();
                    }
                
                    $totalAttendanceMinutes = $timeOut->diffInMinutes($timeIn);
                
                    if ($totalAttendanceMinutes >= $totalShiftMinutes) {
                        $new->status = 'Completed';
                    } elseif ($totalAttendanceMinutes >= $totalShiftMinutes / 2) {
                        $new->status = 'Half';
                    } elseif ($totalAttendanceMinutes >= $totalShiftMinutes / 4) {
                        $new->status = 'Short';
                    } else {
                        $new->status = 'Absent';
                    }
                    
                    $new->save();
                }

    
                if ($request->wantsJson()) {
                    $response = ['status' => true, "message" => "Attendance Updated Successfully!"];
                    return response($response, 200);
                }
    
                session()->flash('success', 'Attendance Updated Successfully!');
                return redirect()->route('admin.attendence.show');
    }

    public function search(Request $request)
    {
        $attendences = Time::query()->with('user.personalInfo'); // Initialize query with relationship

        if ($request->user_id) {
            $attendences->where('user_id', $request->user_id);
        }
        
        if ($request->from_date) {
            $from_date = Carbon::parse($request->from_date)->startOfDay();
            $attendences->where('time_in', '>=', $from_date);
        }
        
        if ($request->to_date) {
            $to_date = Carbon::parse($request->to_date)->endOfDay();
            $attendences->where('time_in', '<=', $to_date);
        }
        
        // Execute query
        $attendences = $attendences->get()
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

                $users = User::with('personalInfo')->where('role_id',2)->get();


    
            return response()->json(['attendences'=>$attendences,'users'=>$users]);  
        

    }


    public function delete($id)
    {
        Time::find($id)->delete();

        session()->flash('success', 'Deleted Successfully!');
        return redirect()->back();
    }

}
