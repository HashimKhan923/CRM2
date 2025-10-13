<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Shift;
use App\Models\Time;
use App\Models\Role;
use App\Models\Location;
use App\Models\LeaveType;
use Carbon\Carbon;
use App\Models\Leave;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $UserCount = User::count();
        $Departments = Department::all();
        $Shifts = Shift::all();
        $Roles = Role::all();
        $Locations = Location::all();
        $LeaveTypes = LeaveType::all();
        $CurrentMonthLeaves = Leave::select('id', 'status')
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->get();
        // $TodayAttendenceCount = Time::whereDate('created_at', Carbon::today('Asia/Karachi'))->count();

        

        return response()->json(['Departments'=>$Departments,'Shifts'=>$Shifts,'Roles'=>$Roles,'Locations'=>$Locations,'LeaveTypes'=>$LeaveTypes,'CurrentMonthLeaves'=>$CurrentMonthLeaves]);


    }
}
