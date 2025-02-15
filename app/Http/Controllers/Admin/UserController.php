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
use App\Models\AdditionalInfo;
use App\Models\Department;
use App\Models\Shift;
use App\Models\Role;
use Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $all_users = User::with(['shift', 'department', 'role', 'personalInfo', 'contactInfo', 'professionalDetails', 'jobInfo', 'compensationInfo', 'additionalInfo'])->where('role_id','!=',1)->get();

        if ($request->wantsJson()) {
            return response()->json(['all_users'=>$all_users]);  
        }

        return view('admin.users.index', compact('all_users'));
    }

    public function create_form()
    {
        $managers = User::whereHas('role', function($query) {
            $query->where('name','manager');
        })->get();

        $shifts = Shift::all();
        return view('admin.users.create', compact('managers','shifts'));
    }

    public function create(Request $request)
    {



        $request->validate([
            // 'email' => 'required|email|unique:users,email',
            // 'phone_number' => 'required|unique:users,phone_number',
            // 'address' => 'required',
            // 'first_name' => 'required|string|max:255',
            // 'date_of_birth' => 'required',
            // 'gender' => 'required',
            // 'work_email' => 'required|email|unique:contact_infos,work_email',
            // 'personal_email' => 'required|email|unique:contact_infos,personal_email',
            // 'work_phone' => 'required',
            // 'personal_phone' => 'required',
            // 'experience' => 'required',
            // 'city' => 'required',
            // 'state' => 'required',
            // 'zip_code' => 'required',
            // 'country' => 'required',
            // 'address' => 'required',
            // 'designation' => 'required',
            // 'department_id' => 'required',
            // 'shift_id' => 'required',
            // 'role_id' => 'required',
            // 'date_of_hire' => 'required',
            // // 'employee_id' => 'required',
            // 'password' => 'required',
            // 'employment_type' => 'required',
            // 'basic_salary' => 'required'
        ]);

        if (!$request->hasFile('image')) {
            return 'No file uploaded';
        }
        
        $file = $request->file('image');
        if (!$file->isValid()) {
            return 'Invalid file';
        }
        
    //    $path =Storage::disk('r2')->put('uploads', $file,'public');        
    //     if (!$path) {
    //         return 'File upload failed';
    //     }

    //  $url =  Storage::disk('r2')->url($path);

        $user = User::create([
            'email' => $request->email,
            'uu_id' => $request->employee_id,
            'shift_id' => $request->shift_id,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status' => 1
        ]);

        $file = $request->file('image');
        $imagePath = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('profile'), $fileName);
                $imagePath = 'profile/' . $fileName;
            }
        }



        $personal_info = PersonalInfo::create([
            'user_id' => $user->id,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'date_of_birth'=> $request->date_of_birth,
            'gender'=> $request->gender,
            'photo' => $url,
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
            'designation'=> $request->designation,
            'manager_id'=> $request->manager_id,
            'date_of_hire'=> $request->date_of_hire,
            'employment_type'=> $request->employment_type,
        ]);

        $allowanceNames = $request->input('allowance_name');
        $allowanceValues = $request->input('allowance_value');
        $deductionNames = $request->input('deduction_name');
        $deductionValues = $request->input('deduction_value');
    
        if(count($allowanceNames) > 0)
        {
            $allowances = [];
            for ($i = 0; $i < count($allowanceNames); $i++) {
                $allowances[$allowanceNames[$i]] = $allowanceValues[$i];
            }
        }

        if(count($deductionNames) > 0)
        {
        $deductions = [];
        for ($i = 0; $i < count($deductionNames); $i++) {
            $deductions[$deductionNames[$i]] = $deductionValues[$i];
        }
        }

        $compensation_info = CompensationInfo::create([
            'user_id' => $user->id,
            'basic_salary'=> $request->basic_salary,
            'allowances'=> $allowances,
            'deductions'=> $deductions,
            'total_salary' => $request->total_salary,
            'bank_account'=> $request->bank_account,

        ]);

        $additional_info = AdditionalInfo::create([
            'user_id' => $user->id,
            'notes'=> $request->notes,
            'preferences'=> $request->preferences,
        ]);


        if ($request->wantsJson()) {
        $response = ['status'=>true,"message" => "Register Successfully"];
        return response($response, 200);
        }

        session()->flash('success', 'User Registerd Successfully');

        return redirect()->route('admin.users.show');
    }

    public function update_form($id)
    {
        $data = User::with(['shift', 'department', 'role', 'personalInfo', 'contactInfo', 'professionalDetails', 'jobInfo', 'compensationInfo', 'additionalInfo'])
                    ->where('id', $id)
                    ->firstOrFail();
    
        $departments = Department::all();
        $shifts = Shift::all();
        $roles = Role::all();
        $managers = User::whereHas('role', function($query) {
            $query->where('name','manager');
        })->get();
    
        return view('admin.users.update', compact('data', 'departments', 'shifts', 'roles','managers'));
    }

    public function view($id)
    {
        $data = User::with(['shift', 'department', 'role', 'personalInfo', 'contactInfo', 'professionalDetails', 'jobInfo', 'compensationInfo', 'additionalInfo'])
                    ->where('id', $id)
                    ->firstOrFail();
    
        $departments = Department::all();
        $shifts = Shift::all();
        $roles = Role::all();
        $managers = User::whereHas('role', function($query) {
            $query->where('name','manager');
        })->get();
    
        return view('admin.users.view', compact('data', 'departments', 'shifts', 'roles','managers'));
    }

    public function update(Request $request)
    {
        // return 'swsdwd';
        // $request->validate([
        //     'email' => 'required|email|unique:users,email,' . $request->user_id,
        //     'phone_number' => 'required|unique:users,phone_number,' . $request->user_id,
        //     'address' => 'required',
        //     'first_name' => 'required|string|max:255',
        //     'date_of_birth' => 'required',
        //     'gender' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'zip_code' => 'required',
        //     'country' => 'required',
        //     'designation' => 'required',
        //     'department_id' => 'required',
        //     'shift_id' => 'required',
        //     'role_id' => 'required',
        // ]);
    
        $user = User::findOrFail($request->user_id);
    
        $user->update([
            'email' => $request->email,
            'uu_id' => $request->uu_id,
            'shift_id' => $request->shift_id,
            'role_id' => $request->role_id,
            'status' => 1
        ]);
    
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }
    
        
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
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'photo' => $imagePath,
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
            'position' => $request->position,
            'manager_id' => $request->manager_id,
            'date_of_hire' => $request->date_of_hire,
            'employment_type' => $request->employment_type,
        ]);


        $allowanceNames = $request->input('allowance_name', []);
        $allowanceValues = $request->input('allowance_value', []);
        $deductionNames = $request->input('deduction_name', []);
        $deductionValues = $request->input('deduction_value', []);
        
        $allowances = [];
        for ($i = 0; $i < count($allowanceNames); $i++) {
            $allowances[$allowanceNames[$i]] = $allowanceValues[$i] ?? 0;
        }
        
        $deductions = [];
        for ($i = 0; $i < count($deductionNames); $i++) {
            $deductions[$deductionNames[$i]] = $deductionValues[$i] ?? 0;
        }
        
        $user->compensationInfo()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'basic_salary' => $request->basic_salary,
                'allowances' => $allowances,
                'deductions' => $deductions,
                'bank_account' => $request->bank_account,
                'total_salary' => $request->total_salary
            ]
        );
    
        $user->additionalInfo()->updateOrCreate(
            ['user_id' => $user->id],[
            'notes' => $request->notes,
            'preferences' => $request->preferences,
        ]);
    
        if ($request->wantsJson()) {
            $response = ['status' => true, "message" => "User updated successfully"];
            return response($response, 200);
        }
    
        session()->flash('success', 'User updated successfully');
        return redirect()->route('admin.users.show');
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

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "User Deleted Successfully"];
            return response($response, 200);
            }
    
            session()->flash('success', 'User Deleted Successfully');
    
            return redirect()->route('admin.users.show');

    }
}
