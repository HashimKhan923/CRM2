<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LeaveBalance;
use Illuminate\Http\Request;

class LeaveBalanceController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    /**
     * Employee: Get current user's leave balances for the current year
     */
    public function index()
    {
        $user = auth()->user();
        $year = date('Y');

        $balances = LeaveBalance::with('leaveType')
            ->where('user_id', $user->id)
            ->where('year', $year)
            ->get();

        return response()->json(['data' => $balances]);
    }

    /**
     * Admin: View a specific user's leave balances
     */
    public function show($userId)
    {
        $year = date('Y');

        $balances = LeaveBalance::with('leaveType')
            ->where('user_id', $userId)
            ->where('year', $year)
            ->get();

        return response()->json(['data' => $balances]);
    }

    /**
     * Admin: Update a user's leave balance
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_days'     => 'required|integer|min:0',
            'used_days'      => 'required|integer|min:0',
            'remaining_days' => 'required|integer|min:0',
        ]);

        $balance = LeaveBalance::findOrFail($id);

        $balance->update([
            'total_days'     => $request->total_days,
            'used_days'      => $request->used_days,
            'remaining_days' => $request->remaining_days,
        ]);

        return response()->json([
            'message' => 'Leave balance updated successfully',
            'data'    => $balance
        ]);
    }

    /**
     * Admin: Reset balances for a user (new year or manual reset)
     */
    public function reset(Request $request, $userId)
    {
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'total_days'    => 'required|integer|min:0',
        ]);

        $year = date('Y');

        $balance = LeaveBalance::updateOrCreate(
            ['user_id' => $userId, 'leave_type_id' => $request->leave_type_id, 'year' => $year],
            ['total_days' => $request->total_days, 'used_days' => 0, 'remaining_days' => $request->total_days]
        );

        return response()->json([
            'message' => 'Leave balance reset successfully',
            'data'    => $balance
        ]);
    }
}
