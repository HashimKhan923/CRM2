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
        $user=User::find($request->id);

        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('profile'), $fileName);
                $imagePath = 'profile/' . $fileName;
            }
        }
    
        $user->personalInfo()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name' => $request->first_name,
                'middle_name'=> $request->middle_name,
                'last_name'=> $request->last_name,
                'national_id'=> $request->national_id,
                'nationality'=> $request->nationality,
                'blood_group'=> $request->blood_group,
                'martial_status'=> $request->martial_status,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'photo' => $imagePath,
            ]
        );
          $response = ['status'=>true,"message" => "Profile Update Successfully","user"=>$admin];
          return response($response, 200);

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
