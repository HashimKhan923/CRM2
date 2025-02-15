<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
        public function create(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255|unique:designations,name',
            ]);

            $designation = Designation::create([
                'name' => $request->name,
            ]);

            return response()->json([
                'success' => true,
                'designation' => $designation,
            ]);
        }
}
