<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\DepartmentManager;
class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::with('department_managers')->get();

            return response()->json(['departments'=>$departments]);  

     }



    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_ids' => 'nullable|array',
            'manager_ids.*' => 'exists:users,id', // Assuming managers are users
        ]);

        $department = Department::create([
            'name' => $request->name,
        ]);

        if ($request->has('manager_ids')) {
            foreach ($request->manager_ids as $id) {
                DepartmentManager::create([
                    'department_id' => $department->id,
                    'manager_id' => $id,
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'New Department Created Successfully!',
        ]);
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'manager_ids' => 'nullable|array',
            'manager_ids.*' => 'exists:users,id',
        ]);

        $department = Department::findOrFail($request->department_id);
        $department->name = $request->name;
        $department->save();

        // Sync managers: delete old and insert new
        DepartmentManager::where('department_id', $department->id)->delete();

        if ($request->has('manager_ids')) {
            foreach ($request->manager_ids as $managerId) {
                DepartmentManager::create([
                    'department_id' => $department->id,
                    'manager_id' => $managerId,
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Department updated successfully!',
        ]);
    }


    public function detail($id)
    {
        $data = Department::find($id);

        return response()->json(['data'=>$data]);  

    }



    public function delete(Request $request, $id)
    {
        Department::find($id)->delete();

            $response = ['status'=>true,"message" => "Department Deleted Successfully"];
            return response($response, 200);


    }

    public function changeStatus($id)
    {
        $status = Department::where('id',$id)->first();

        if($status->status == 1)
        {
            $status->status = 0;
        }
        else
        {
            $status->status = 1;
        }
        $status->save();

        $response = ['status'=>true,"message" => "Status Changed Successfully!"];
        return response($response, 200);

    }
}
