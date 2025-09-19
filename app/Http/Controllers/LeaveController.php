<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use App\Mail\LeaveStatusChanged;
use App\Models\Leave;
use App\Models\LeaveBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class LeaveController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    // GET /api/leaves
    public function index($user_id)
    {
        
        $leaveBalance = LeaveBalance::where('user_id', $user_id)->get();
        
        $leaves = Leave::with('user.leaveBalance','leaveType','approver')->where('user_id',$user_id)->get();


        return response()->json($leaves, $leaveBalance);
    }

    // POST /api/leaves
    public function store(StoreLeaveRequest $request)
    {
        $user  = auth()->user();
        $start = $request->start_date;
        $end   = $request->end_date;
        $days  = Leave::daysBetween($start, $end);

        // Overlap check (pending or approved)
        $overlap = Leave::where('user_id', $user->id)
            ->where(function($q) use ($start, $end) {
                $q->whereBetween('start_date', [$start, $end])
                  ->orWhereBetween('end_date', [$start, $end])
                  ->orWhere(function($q2) use ($start, $end){
                      $q2->where('start_date','<',$start)
                         ->where('end_date','>',$end);
                  });
            })
            ->whereIn('status',['pending','approved'])
            ->exists();

        if ($overlap) {
            return response()->json(['message' => 'Overlapping leave exists'], 422);
        }

        // Check balance for given year (simple: based on start year)
        $year = Carbon::parse($start)->year;
        $balance = LeaveBalance::where('user_id', $user->id)
                    ->where('leave_type_id', $request->leave_type_id)
                    ->where('year', $year)
                    ->first();

        if (!$balance || $balance->remaining_days < $days) {
            return response()->json(['message' => 'Insufficient leave balance'], 422);
        }

        $leave = Leave::create([
            'user_id' => $user->id,
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $start,
            'end_date' => $end,
            'days' => $days,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Leave request submitted', 'leave' => $leave], 201);
    }

    // GET /api/leaves/{leave}
    public function show($id)
    {
        $user = auth()->user();

        $leave = Leave::findOrFail($id);

        // if (!$user->is_admin && $leave->user_id !== $user->id) {
        //     return response()->json(['message' => 'Unauthorized'], 403);
        // }

        return response()->json($leave->load('user','leaveType','approver'));
    }

    // PUT /api/leaves/{leave}  (user edits pending leave)
    public function update(UpdateLeaveRequest $request)
    {
        $user = auth()->user();
        $leave = Leave::findOrFail($request->id);

        if ($leave->user_id !== $user->id || $leave->status !== 'pending') {
            return response()->json(['message' => 'Not allowed to edit this leave'], 403);
        }

        $start = $request->start_date;
        $end   = $request->end_date;
        $days  = Leave::daysBetween($start, $end);

        // Overlap check excluding this leave
        $overlap = Leave::where('user_id', $user->id)
            ->where('id', '!=', $leave->id)
            ->where(function($q) use ($start, $end) {
                $q->whereBetween('start_date', [$start, $end])
                  ->orWhereBetween('end_date', [$start, $end])
                  ->orWhere(function($q2) use ($start, $end){
                      $q2->where('start_date','<',$start)
                         ->where('end_date','>',$end);
                  });
            })
            ->whereIn('status',['pending','approved'])
            ->exists();

        if ($overlap) {
            return response()->json(['message' => 'Overlapping leave exists'], 422);
        }

        // balance check
        $year = Carbon::parse($start)->year;
        $balance = LeaveBalance::where('user_id', $user->id)
                    ->where('leave_type_id', $request->leave_type_id)
                    ->where('year', $year)
                    ->first();

        if (!$balance || $balance->remaining_days < $days) {
            return response()->json(['message' => 'Insufficient leave balance for requested dates'], 422);
        }

        $leave->update([
            'leave_type_id' => $request->leave_type_id,
            'start_date' => $start,
            'end_date' => $end,
            'days' => $days,
            'reason' => $request->reason,
        ]);

        return response()->json(['message' => 'Leave updated', 'leave' => $leave]);
    }

    // DELETE /api/leaves/{leave}  (user cancels pending leave)
    public function destroy($id)
    {
        $user = auth()->user();
        $leave = Leave::findOrFail($id);

        if ($leave->user_id !== $user->id) {
            return response()->json(['message' => 'Not allowed'], 403);
        }

        if (!in_array($leave->status, ['pending'])) {
            return response()->json(['message' => 'Only pending leaves can be cancelled'], 422);
        }

        $leave->status = 'cancelled';
        $leave->save();

        return response()->json(['message' => 'Leave cancelled', 'leave' => $leave]);
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