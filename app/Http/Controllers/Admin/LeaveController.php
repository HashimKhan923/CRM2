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


        // POST /api/leaves/{leave}/approve  (admin)
    public function approve($id, Request $request)
    {
        $user = auth()->user();
        $leave = Leave::findOrFail($id);
        if (!$user->role->id == 1) return response()->json(['message' => 'Unauthorized'], 403);
        if ($leave->status !== 'pending') return response()->json(['message' => 'Only pending leaves can be approved'], 422);

        try {
            DB::transaction(function() use ($leave, $user) {
                // simple year assumption: start_date year
                $year = Carbon::parse($leave->start_date)->year;

                $balance = LeaveBalance::where('user_id', $leave->user_id)
                    ->where('leave_type_id', $leave->leave_type_id)
                    ->where('year', $year)
                    ->lockForUpdate()
                    ->first();

                if (!$balance || $balance->remaining_days < $leave->days) {
                    throw new \Exception('Insufficient balance to approve');
                }

                $balance->remaining_days -= $leave->days;
                $balance->used_days += $leave->days;
                $balance->save();

                $leave->status = 'approved';
                $leave->approved_by = $user->id;
                $leave->approved_at = now();
                $leave->save();
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unable to approve: ' . $e->getMessage()], 422);
        }

        // email notification (synchronous). In production queue this.
        try {
            Mail::to($leave->user->email)->send(new LeaveStatusChanged($leave->fresh()));
        } catch (\Throwable $ex) {
            // Don't fail approval if email fails — log or handle as needed
        }

        return response()->json(['message' => 'Leave approved', 'leave' => $leave->fresh()]);
    }

    // POST /api/leaves/{leave}/reject  (admin)
    public function reject($id, Request $request)
    {
        $user = auth()->user();
        $leave = Leave::findOrFail($id);
        if (!$user->role->id == 1) return response()->json(['message' => 'Unauthorized'], 403);
        if ($leave->status !== 'pending') return response()->json(['message' => 'Only pending leaves can be rejected'], 422);

        $leave->status = 'rejected';
        $leave->approved_by = $user->id;
        $leave->approved_at = now();
        $leave->save();

        try {
            Mail::to($leave->user->email)->send(new LeaveStatusChanged($leave));
        } catch (\Throwable $ex) {
            // ignore
        }

        return response()->json(['message' => 'Leave rejected', 'leave' => $leave]);
    }
}
