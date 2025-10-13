<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttendenceRequest;
use Carbon\Carbon;
use App\Models\Time;


class AttendenceRequestController extends Controller
{
    public function index(Request $request, $id)
    {
        $AttendenceRequests = AttendenceRequest::where('user_id',$id)->get();

        return response()->json(['AttendenceRequests'=>$AttendenceRequests]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'reason' => 'required|string',
            'time_in' => 'required|date',
            'time_out' => 'required|date|after:time_in',
        ]);

        $attendenceRequest = AttendenceRequest::create([
            'user_id' => $request->user_id,
            'reason' => $request->reason,
            'time_in' => Carbon::parse($request->time_in),
            'time_out' => Carbon::parse($request->time_out),
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Attendance request submitted successfully.', 'attendenceRequest' => $attendenceRequest], 201);
    }

    public function show($id)
    {
        $attendenceRequest = AttendenceRequest::find($id);

        if (!$attendenceRequest) {
            return response()->json(['message' => 'Attendance request not found.'], 404);
        }

        return response()->json(['attendenceRequest' => $attendenceRequest]);
    }

    public function update(Request $request, $id)
    {
        $attendenceRequest = AttendenceRequest::find($id);

        if (!$attendenceRequest) {
            return response()->json(['message' => 'Attendance request not found.'], 404);
        }

        $request->validate([
            'reason' => 'sometimes|required|string',
            'time_in' => 'sometimes|required|date',
            'time_out' => 'sometimes|required|date|after:time_in',
            'status' => 'sometimes|required|in:pending,approved,rejected',
        ]);

        $attendenceRequest->update($request->only(['reason', 'time_in', 'time_out', 'status']));

        return response()->json(['message' => 'Attendance request updated successfully.', 'attendenceRequest' => $attendenceRequest]);
    }


    public function destroy($id)
    {
        $attendenceRequest = AttendenceRequest::find($id);

        if (!$attendenceRequest) {
            return response()->json(['message' => 'Attendance request not found.'], 404);
        }

        $attendenceRequest->delete();

        return response()->json(['message' => 'Attendance request deleted successfully.']);
    }
}
