<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Shift;
use App\Models\Time;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $UserCount = User::count();
        $DepartmentCount = Department::count();
        $ShiftCount = Shift::count();
        $TodayAttendenceCount = Time::whereDate('created_at', Carbon::today('Asia/Karachi'))->count();

        

        return response()->json(['UserCount'=>$UserCount,'DepartmentCount'=>$DepartmentCount,'ShiftCount'=>$ShiftCount,'TodayAttendenceCount'=>$TodayAttendenceCount]);


    }
}
