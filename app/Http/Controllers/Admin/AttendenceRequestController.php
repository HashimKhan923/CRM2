<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AttendenceRequest;

class AttendenceRequestController extends Controller
{
    public function index(Request $request)
    {
        $AttendenceRequests = AttendenceRequest::with('user')->get();
        return response()->json(['AttendenceRequests'=>$AttendenceRequests]);  
    }

    public function show($id)
    {
        $attendenceRequest = AttendenceRequest::with('user')->find($id);

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

        $attendenceRequest->status = 'approved';
        $attendenceRequest->save();

        return response()->json(['message' => 'Attendance request approved successfully.', 'attendenceRequest' => $attendenceRequest]);
    }
}
