<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttendenceRequest;
use Carbon\Carbon;
use App\Models\Time;
use App\Models\User;
use App\Models\Shift;



class AttendenceRequestController extends Controller
{
    public function index(Request $request)
    {
        $AttendenceRequests = AttendenceRequest::with('user.personalInfo')->get();
        return response()->json(['AttendenceRequests'=>$AttendenceRequests]);  
    }

    public function show($id)
    {
        $attendenceRequest = AttendenceRequest::with('user.personalInfo')->find($id);

        if (!$attendenceRequest) {
            return response()->json(['message' => 'Attendance request not found.'], 404);
        }

        return response()->json(['attendenceRequest' => $attendenceRequest]);
    }

    public function approve($id)
    {
        $attendenceRequest = AttendenceRequest::find($id);

        if (!$attendenceRequest) {
            return response()->json(['message' => 'Attendance request not found.'], 404);
        }





        $check_user = User::where('id', $attendenceRequest->user_id)->first();
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
                $new->user_id = $attendenceRequest->user_id;
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





        $attendenceRequest->status = 'approved';
        $attendenceRequest->save();

        return response()->json(['message' => 'Attendance request approved successfully.', 'attendenceRequest' => $attendenceRequest]);
    }

    public function reject($id)
    {
        $attendenceRequest = AttendenceRequest::find($id);

        if (!$attendenceRequest) {
            return response()->json(['message' => 'Attendance request not found.'], 404);
        }

        $attendenceRequest->status = 'rejected';
        $attendenceRequest->save();

        return response()->json(['message' => 'Attendance request rejected successfully.', 'attendenceRequest' => $attendenceRequest]);
    }
}
