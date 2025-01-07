<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function profile_view($id)
    {
      $profile = User::where('id',$id)->first();

      return response()->json(['profile'=>$profile],200);
    }

    public function usercheck(Request $request)
    {
        $user=auth('api')->user();
        return response()->json(['admin_profile'=>$user],200);
    }

    public function profile_update(Request $request){
        $id=$request->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:users,email,$id,id",

        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $admin=User::find($id);
        $admin->name=$request->name;
        $admin->email=$request->email;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('Profile'), $filename);
            $new->image = $filename;
        }
        if($admin->save()){
          $response = ['status'=>true,"message" => "Profile Update Successfully","user"=>$admin];
          return response($response, 200);
        }
        $response = ['status'=>false,"message" => "Profile Not Update Successfully"];
         return response($response, 422);  
    }

    public function passwordChange(Request $request){
        $controlls = $request->all();
        $id=$request->id;
        $rules = array(
            "old_password" => "required",
            "new_password" => "required|required_with:confirm_password|same:confirm_password",
            "confirm_password" => "required"
        );

        $validator = Validator::make($controlls, $rules);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $user = User::where('id',$request->id)->first();
        $hashedPassword = $user->password;
 
        if(Hash::check($request->old_password , $hashedPassword )) {
 
            if (!Hash::check($request->new_password , $hashedPassword)) {
                $users =User::find($request->id);
                $users->password = bcrypt($request->new_password);
                $users->save();
                $response = ['status'=>true,"message" => "Password Changed Successfully"];
                return response($response, 200);
            }else{
                $response = ['status'=>true,"message" => "new password can not be the old password!"];
                return response($response, 422);
            }
 
        }else{
            $response = ['status'=>true,"message" => "old password does not matched"];
            return response($response, 422);
        }

    }
}
