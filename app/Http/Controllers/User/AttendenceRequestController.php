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
        // $request->validate([
        //     'time_id' => 'sometimes|exists:times,id',
        //     'user_id' => 'required|exists:users,id',
        //     'reason' => 'required|string',
        //     'time_in' => 'required|date',
        //     // 'time_out' => 'required|date|after:time_in',
        // ]);

        $attendenceRequest = AttendenceRequest::create([
            'time_id' => $request->time_id,
            'user_id' => $request->user_id,
            'reason' => $request->reason,
            'time_in' => $request->time_in ? Carbon::parse($request->time_in) : null,
            'time_out' => (!empty($request->time_out) && strtolower($request->time_out) !== 'null')
                ? Carbon::parse($request->time_out)
                : null,
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

    public function update(Request $request)
    {
        $attendenceRequest = AttendenceRequest::find($request->id);

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
