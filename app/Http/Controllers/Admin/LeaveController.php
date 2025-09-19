<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with([
            'user.leaveBalances.leaveType',
            'user.personalInfo',
            'leaveType',
            'approver'
        ])->get();

        return response()->json([
            'leaves' => $leaves,
        ], 200);
    }
}
