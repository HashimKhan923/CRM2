<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactInfo;
use App\Models\PersonalInfo;
use App\Models\ProfessionalDetails;
use App\Models\JobInfo;
use App\Models\CompensationInfo;
use App\Models\AccountInformation;
use App\Models\AdditionalInfo;
use App\Models\Department;
use App\Models\Shift;
use App\Models\Role;
use App\Models\OverTime;
use App\Models\LeaveBalance;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $all_users = User::with(['shift', 'department', 'role', 'personalInfo', 'contactInfo', 'professionalDetails', 'jobInfo.department', 'compensationInfo', 'additionalInfo','accountInfo','overTime','location'])->where('role_id','!=',1)->get();

       
        return response()->json(['all_users'=>$all_users]);  
        
    }



    public function create(Request $request)
    {


        $user = User::create([
            'email' => $request->email,
            'uu_id' => $request->employee_id,
            'shift_id' => $request->shift_id,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'location_id' => $request->location_id,
            'tenant_id' => $request->tenant_id,
            'status' => 1
        ]);

        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $folder = public_path('profile');

                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }

                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($folder, $fileName);
                $imagePath = 'profile/' . $fileName;
            }
        }


        $personal_info = PersonalInfo::create([
            'user_id' => $user->id,
            'first_name'=> $request->first_name,
            'middle_name'=> $request->middle_name,
            'last_name'=> $request->last_name,
            'national_id'=> $request->national_id,
            'nationality'=> $request->nationality,
            'blood_group'=> $request->blood_group,
            'martial_status'=> $request->martial_status,
            'date_of_birth'=> $request->date_of_birth,
            'gender'=> $request->gender,
            'photo' => $imagePath,
        ]);

        $contact_info = ContactInfo::create([
            'user_id' => $user->id,
            'work_email'=> $request->work_email,
            'personal_email'=> $request->personal_email,
            'work_phone'=> $request->work_phone,
            'personal_phone'=> $request->personal_phone,
            'address'=> $request->address,
            'city'=> $request->city,
            'state'=> $request->state,
            'zip_code'=> $request->zip_code,
            'country'=> $request->country,
        ]);

        $professional_details = ProfessionalDetails::create([
            'user_id' => $user->id,
            'skills'=> $request->skills,
            'qualifications'=> $request->qualifications,
            'experience'=> $request->experience,
        ]);

        $job_info = JobInfo::create([
            'user_id' => $user->id,
            'department_id'=> $request->department_id,
            'position'=> $request->position,
            'designation'=> $request->designation,
            'manager_id'=> $request->manager_id,
            'date_of_hire'=> $request->date_of_hire,
            'employment_type'=> $request->employment_type,
        ]);

        if($request->leave_types)
        {
            foreach ($request->leave_types as $leave) {
            LeaveBalance::create([
                'user_id'        => $user->id,
                'leave_type_id'  => $leave['leave_type_id'],
                'year'           => date('Y'),
                'total_days'     => $leave['total_days'],
                'used_days'      => 0,
                'remaining_days' => $leave['total_days'],
            ]);
        }
        }




        // $allowanceNames = $request->input('allowance_name');
        // $allowanceValues = $request->input('allowance_value');
        // $deductionNames = $request->input('deduction_name');
        // $deductionValues = $request->input('deduction_value');

        // if(count($allowanceNames) > 0)
        // {
        //     $allowances = [];
        //     for ($i = 0; $i < count($allowanceNames); $i++) {
        //         $allowances[$allowanceNames[$i]] = $allowanceValues[$i];
        //     }
        // }

        // if(count($deductionNames) > 0)
        // {
        // $deductions = [];
        // for ($i = 0; $i < count($deductionNames); $i++) {
        //     $deductions[$deductionNames[$i]] = $deductionValues[$i];
        // }
        // }

        $compensation_info = CompensationInfo::create([
            'user_id' => $user->id,
            'basic_salary'=> $request->basic_salary,
            'allowances'=> $request->allowances,
            'deductions'=> $request->deductions,
            'total_salary' => $request->total_salary,
            'salary_payment_duration' => $request->salary_payment_duration,
            'bank_account'=> $request->bank_account,

        ]);

        $account_info = AccountInformation::create([
            'user_id' => $user->id,
            'bank_name'=> $request->bank_name,
            'routing_number'=> $request->routing_number,
            'account_title'=> $request->account_title,
            'iban_number' => $request->iban_number,
        ]);

        $over_time = OverTime::create([
            'user_id' => $user->id,
            'maximum_hours_limit'=> $request->maximum_hours_limit,
            'status' => 1,
        ]);

        

        // $over_time = OverTime::create([
        //     'emp_id' => $user->id,
        //     'time_limit'=> $request->time_limit,
        //     'rate'=> $request->rate,
        // ]);

        // $additional_info = AdditionalInfo::create([
        //     'user_id' => $user->id,
        //     'notes'=> $request->notes,
        //     'preferences'=> $request->preferences,
        // ]);


        Mail::send(
            'mails.new_employee',
            [
                'name' => $request->first_name,
                'email' => $request->email,
                'password' => $request->password,
                'product_key' => $request->tenant_id,
            ],
            function ($message) use ($request) { 
                $message->from('support@lockmytimes.com','Lockmytimes');
                $message->to($request->email);
                $message->subject('Employee Account Created');
            }
        );


      
        $response = ['status'=>true,"message" => "Register Successfully"];
        return response($response, 200);
        

    }



    public function view($id)
    {
        $data = User::with(['shift', 'department', 'role', 'personalInfo', 'contactInfo', 'professionalDetails', 'jobInfo','compensationInfo', 'additionalInfo','accountInfo','leaveBalance'])
                    ->where('id', $id)
                    ->firstOrFail();
    
        $departments = Department::all();
        $shifts = Shift::all();
        $roles = Role::all();
        $managers = User::whereHas('role', function($query) {
            $query->where('name','manager');
        })->get();
    
        return response()->json(['data'=>$data]);  
    }

    public function update(Request $request)
    {

    
        $user = User::findOrFail($request->user_id);
    
        $user->update([
            'email' => $request->email,
            'uu_id' => $request->employee_id,
            'shift_id' => $request->shift_id,
            'role_id' => $request->role_id,
            'location_id' => $request->location_id,
            'status' => 1
        ]);
    
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
    
        
        $imagePath = null;

        // Handle image upload only if new file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('profile'), $fileName);
                $imagePath = 'profile/' . $fileName;
            }
        }

        // Get existing personal info
        $personalInfo = $user->personalInfo()->first();

        $user->personalInfo()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'first_name'     => $request->first_name,
                'middle_name'    => $request->middle_name,
                'last_name'      => $request->last_name,
                'national_id'    => $request->national_id,
                'nationality'    => $request->nationality,
                'blood_group'    => $request->blood_group,
                'martial_status' => $request->martial_status,
                'date_of_birth'  => $request->date_of_birth,
                'gender'         => $request->gender,
                'photo'          => $imagePath ?? optional($personalInfo)->photo,
            ]
        );
    
        $user->contactInfo()->updateOrCreate(
            ['user_id' => $user->id],
            [
            'work_email'=> $request->work_email,
            'personal_email'=> $request->personal_email,
            'work_phone'=> $request->work_phone,
            'personal_phone'=> $request->personal_phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
        ]);
    
        $user->professionalDetails()->updateOrCreate(
            ['user_id' => $user->id],[
            'skills' => $request->skills,
            'qualifications' => $request->qualifications,
            'experience' => $request->experience,
        ]);
    
        $user->jobInfo()->updateOrCreate(
            ['user_id' => $user->id],[
            'department_id' => $request->department_id,
            'designation' => $request->designation,
            'manager_id' => $request->manager_id,
            'date_of_hire' => $request->date_of_hire,
            'employment_type' => $request->employment_type,
        ]);

        LeaveBalance::where('user_id', $user->id)->delete();

        if($request->leave_types)
        {
            

            foreach ($request->leave_types as $leave) {
            LeaveBalance::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'leave_type_id' => $leave['leave_type_id'],
                    'year' => date('Y'),
                ],
                [
                    'total_days' => $leave['total_days'],
                    'remaining_days' => $leave['total_days'],

                ]
            );
            }
        }


        


        // $allowanceNames = $request->input('allowance_name', []);
        // $allowanceValues = $request->input('allowance_value', []);
        // $deductionNames = $request->input('deduction_name', []);
        // $deductionValues = $request->input('deduction_value', []);
        
        // $allowances = [];
        // for ($i = 0; $i < count($allowanceNames); $i++) {
        //     $allowances[$allowanceNames[$i]] = $allowanceValues[$i] ?? 0;
        // }
        
        // $deductions = [];
        // for ($i = 0; $i < count($deductionNames); $i++) {
        //     $deductions[$deductionNames[$i]] = $deductionValues[$i] ?? 0;
        // }
        
        $user->compensationInfo()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'basic_salary' => $request->basic_salary,
                'allowances'=> $request->allowances,
                'deductions'=> $request->deductions,
                'bank_account' => $request->bank_account,
                'total_salary' => $request->total_salary,
                'salary_payment_duration' => $request->salary_payment_duration
            ]
        );

                $user->accountInfo()->updateOrCreate(
            ['user_id' => $user->id],
            [
            'bank_name'=> $request->bank_name,
            'routing_number'=> $request->routing_number,
            'account_title'=> $request->account_title,
            'iban_number' => $request->iban_number,
            ]

            );

            $user->overTime()->updateOrCreate(
            ['user_id' => $user->id],
            [
            'maximum_hours_limit'=> $request->maximum_hours_limit,
            ]
            );


    
        // $user->additionalInfo()->updateOrCreate(
        //     ['user_id' => $user->id],[
        //     'notes' => $request->notes,
        //     'preferences' => $request->preferences,
        // ]);
    
      
            $response = ['status' => true, "message" => "User updated successfully"];
            return response($response, 200);
        
    
    }
    

    public function changeStatus($id)
    {
        $status = User::where('id',$id)->first();

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

    public function delete(Request $request, $id)
    {
        User::find($id)->delete();

       
        $response = ['status'=>true,"message" => "User Deleted Successfully"];
        return response($response, 200);
            
    }
}
