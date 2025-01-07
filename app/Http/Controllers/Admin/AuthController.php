<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDocumantion;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function register (Request $request) {

        
    
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            "email" => "required|email|unique:users,email",
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone;
        $user->designation = $request->designation;
        $user->shift_id = $request->shift_id;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->department_id = $request->department_id;
        $user->manager_id = $request->manager_id;
        $user->status = 1;
        $user->save();

        // $userDocumantion = new UserDocumantion();
        // $userDocumantion->user_id = $user->id;
        // if($request->file('documents'))
        // {
            
        //     foreach($request->documents as $document)
        //     { 
        //         $file= $document;
        //         $filename= date('YmdHis').$file->getClientOriginalName();
        //         $file->storeAs('public', $filename);
        //         $UserDocumantion[] = $filename;
                
        //     }

        //     $userDocumantion->documents = $UserDocumantion;

        // }

        // $userDocumantion->save();

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['status'=>true,"message" => "Register Successfully",'token' => $token];
        return response($response, 200);
    }





}
