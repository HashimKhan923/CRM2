<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();

        if ($request->wantsJson()) {
            return response()->json(['departments'=>$departments]);  
        }

        return view('admin.departments.index', compact('departments'));   
     }

     public function create_form()
     {
         return view('admin.departments.create');
     }

    public function create(Request $request)
    {
        $new = new Department();
        $new->name = $request->name;
        $new->latitude = $request->latitude;
        $new->longitude = $request->longitude;
        $new->radius = $request->radius;
        $new->save();


        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "New Department Created Successfully!"];
            return response($response, 200);
            }
    
            session()->flash('success', 'New Department Created Successfully!');
    
            return redirect()->route('admin.department.show');
    }

    public function update_form($id)
    {
        $data = Department::where('id',$id)->first();

        return view('admin.departments.update',compact('data'));
    }

    public function update(Request $request)
    {
        $update = Department::where('id',$request->department_id)->first();
        $update->name = $request->name;
        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->radius = $request->radius;
        $update->save();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Department Updated Successfully"];
            return response($response, 200);
            }
    
            session()->flash('success', 'Department Updated Successfully');
    
            return redirect()->route('admin.department.show');
    }

    public function delete(Request $request, $id)
    {
        Department::find($id)->delete();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Department Deleted Successfully"];
            return response($response, 200);
            }
    
            session()->flash('success', 'Department Deleted Successfully');
    
            return redirect()->route('admin.department.show');

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
