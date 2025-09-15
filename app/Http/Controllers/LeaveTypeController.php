<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    // public function __construct()
    // {
    //     // employees can only view (index)
    //     $this->middleware('auth:sanctum')->only(['index']);
    //     // you can add admin middleware for create/update/delete if needed
    // }

    /**
     * Employee & Admin: List all leave types
     * GET /api/leave-types
     */
    public function index()
    {
        $types = LeaveType::all();
        return response()->json(['data' => $types]);
    }

    /**
     * Admin: Create a new leave type
     * POST /api/admin/leave-types/create
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|unique:leave_types,name',
            'max_days_per_year'  => 'required|integer|min:0',
        ]);

        $type = LeaveType::create([
            'name' => $request->name,
            'description' => $request->description ?? null,
            'max_days_per_year' => $request->max_days_per_year ?? 0,
        ]);

        return response()->json([
            'message' => 'Leave type created successfully',
            'data'    => $type
        ], 201);
    }

    /**
     * Admin: Update an existing leave type
     * POST /api/admin/leave-types/update/{id}
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:leave_types,name,' . $id,
            'days' => 'required|integer|min:0',
        ]);

        $type = LeaveType::findOrFail($id);

        $type->update([
            'name' => $request->name,
            'description' => $request->description ?? null,
            'max_days_per_year' => $request->max_days_per_year ?? 0,
        ]);

        return response()->json([
            'message' => 'Leave type updated successfully',
            'data'    => $type
        ]);
    }

    /**
     * Admin: Delete a leave type
     * GET /api/admin/leave-types/delete/{id}
     */
    public function destroy($id)
    {
        $type = LeaveType::findOrFail($id);
        $type->delete();

        return response()->json(['message' => 'Leave type deleted successfully']);
    }
}
