<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();

        if ($request->wantsJson()) {
            return response()->json(['roles'=>$roles]);  
        }

        return view('admin.roles.index', compact('roles'));   
    }

    public function create_form()
    {
        return view('admin.roles.create');
    }

    public function create(Request $request)
    {
        $new = new Role();
        $new->name = $request->name;
        $new->save();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "New Role Created Successfully!"];
            return response($response, 200);
            }
    
            session()->flash('success', 'New Role Created Successfully!');
    
            return redirect()->route('admin.role.show');
    }

    public function update_form($id)
    {
        $data = Role::where('id',$id)->first();

        return view('admin.roles.update',compact('data'));
    }

    public function update(Request $request)
    {
        $update = Role::where('id',$request->id)->first();
        $update->name = $request->name;
        $update->save();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Role Updated Successfully!"];
            return response($response, 200);
            }
    
            session()->flash('success', 'New role Created Successfully!');
    
            return redirect()->route('admin.role.show');
    }

    public function delete(Request $request, $id)
    {
        Role::find($id)->delete();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Role Deleted Successfully"];
            return response($response, 200);
            }
    
            session()->flash('success', 'Role Deleted Successfully');
    
            return redirect()->route('admin.role.show');

    }

    public function changeStatus($id)
    {
        $status = Role::where('id',$id)->first();

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
