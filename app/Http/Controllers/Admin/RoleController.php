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

        return response()->json(['roles'=>$roles]);  

    }



    public function create(Request $request)
    {
        $new = new Role();
        $new->name = $request->name;
        $new->save();

            $response = ['status'=>true,"message" => "New Role Created Successfully!"];
            return response($response, 200);
    
    }



    public function update(Request $request)
    {
        $update = Role::where('id',$request->id)->first();
        $update->name = $request->name;
        $update->save();

            $response = ['status'=>true,"message" => "Role Updated Successfully!"];
            return response($response, 200);

    }

    public function delete(Request $request, $id)
    {
        Role::find($id)->delete();

            $response = ['status'=>true,"message" => "Role Deleted Successfully"];
            return response($response, 200);


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
