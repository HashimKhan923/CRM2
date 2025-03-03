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
        $attendences = Time::with(['user', 'breaks']) // Load related breaks
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

        if ($request->wantsJson()) {
            return response()->json(['attendences'=>$attendences]);  
        }

        return view('user.attendences.index', compact('attendences')); 
    }

    public function search(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->startOfDay();
        $to_date = Carbon::parse($request->to_date)->endOfDay();

        $attendences = Time::with('user')->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->where('user_id',auth()->user()->id)->get();

        if ($request->wantsJson()) {
            return response()->json(['attendences'=>$attendences]);  
        }

        return view('user.attendences.index', compact('attendences')); 
    }

    public function time_in(Request $request)
    {

        $check_user = User::where('id', $request->user_id)->first();
        $check_shift = Shift::where('id', $check_user->shift_id)->first();
        $department = JobInfo::where('user_id',$request->user_id)->first();
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

        $userLat = $request->latitude;
        $userLng = $request->longitude;
        // $departmentId = $department->department_id;

        // if ($this->isWithinOfficeLocation($request->latitude, $request->longitude, $department)) {

        //     return $this->isWithinOfficeLocation();
        //     // session()->flash('success', 'You are not in Department location!');
        //     // return redirect()->back();
        // }

        // if ($this->geolocationService->isWithinRadius($userLat, $userLng, $department->latitude, $department->longitude, $department->radius)) {

            if ($ShiftTimeOut->lt($ShiftTimeIn)) {
                $ShiftTimeOut->addDay();
            }
        
            if ($CurrentTime->gt($ShiftTimeIn) && $CurrentTime->lt($ShiftTimeOut)) {
                $check = Time::where('user_id', $request->user_id)->whereDate('created_at', Carbon::today('Asia/Karachi'))->first();
        
                if (!$check) {
                    $new = new Time();
                    $new->user_id = $request->user_id;
                    $new->time_in = Carbon::now('Asia/Karachi');
        
                    // Check if the user is late
                    if ($CurrentTime->greaterThan($ShiftTimeIn->copy()->addMinutes(15))) {
                        $new->late_status = 1;
                    }
        
                    $new->save();
        
                    if ($request->wantsJson()) {
                        $response = ['status' => true, "message" => "Attendance Marked Successfully!"];
                        return response($response, 200);
                    }
        
                    session()->flash('success', 'Attendance Marked Successfully!');
                    return redirect()->back();
        
                } else {
                    if ($request->wantsJson()) {
                        $response = ['status' => true, "message" => "Your Attendance is Already Marked!"];
                        return response($response, 200);
                    }
        
                    session()->flash('success', 'Your Attendance is Already Marked!');
                    return redirect()->back();
                }
        
            } else {
                if ($request->wantsJson()) {
                    $response = ['status' => true, "message" => "Your shift has not started yet!"];
                    return response($response, 200);
                }
        
                session()->flash('success', 'Your shift has not started yet!');
                return redirect()->back();
            }

        // }
        // else
        // {
        //     session()->flash('success', 'You are not in Department location!');
        //     return redirect()->back();
        // }

        // if (!$this->isWithinDepartmentLocation($userLat, $userLng, $departmentId)) {
        //     session()->flash('success', 'You are not in Department location!');
        //     return redirect()->back();       
        //  }


    
     
    }


    private function isWithinOfficeLocation($latitude, $longitude, $department)
    {
        $distance = $this->calculateDistance($latitude, $longitude, $department->latitude, $department->longitude);

        return $distance;
    }

    // function isWithinDepartmentLocation($userLat, $userLng, $departmentId)
    // {
    //     $department = Department::find($departmentId);
        
    //     if (!$department) {
    //         return false;
    //     }

    //     $distance = $this->haversineDistance(
    //         $userLat, $userLng,
    //         $department->latitude, $department->longitude
    //     );

    //     return $distance <= $department->radius; // Returns true if inside, false otherwise
    // }

    // function haversineDistance($lat1, $lng1, $lat2, $lng2)
    // {
    //     $earthRadius = 6371; // Radius of the Earth in kilometers

    //     $dLat = deg2rad($lat2 - $lat1);
    //     $dLng = deg2rad($lng2 - $lng1);

    //     $a = sin($dLat/2) * sin($dLat/2) +
    //         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
    //         sin($dLng/2) * sin($dLng/2);
            
    //     $c = 2 * atan2(sqrt($a), sqrt(1-$a));

    //     return $earthRadius * $c; // Distance in km
    // }


    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371000; // meters
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }
    

    public function time_out(Request $request, $id)
    {
        $user = User::find($id);
        $shift = Shift::find($user->shift_id);
        
        $shiftStart = Carbon::parse($shift->time_from);
        $shiftEnd = Carbon::parse($shift->time_to);
        
        if ($shiftEnd->lessThan($shiftStart)) {
            $shiftEnd->addDay();
        }
    
        $totalShiftMinutes = $shiftEnd->diffInMinutes($shiftStart);
    
        $timeRecord = Time::where('user_id', $id)
                          ->whereDate('created_at', Carbon::today('Asia/Karachi'))
                          ->first();
    
        if (!$timeRecord) {
            return response()->json(['status' => false, 'message' => 'No time in record found for today'], 400);
        }
    
        $timeRecord->time_out = Carbon::now('Asia/Karachi');
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
    
        if ($request->wantsJson()) {
            return response()->json(['status' => true, 'message' => 'Time out Successfully!'], 200);
        }
    
        session()->flash('success', 'Time out Successfully!');
        return redirect()->back();
    }
    
    
    
    
    
    
}
