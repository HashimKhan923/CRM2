<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index()
    {
        $Projects=Project::all();

        return view('admin.projects.index',compact('Projects'));
    }

    public function create_form()
    {
        $managers = User::whereHas('role', function($query) {
            $query->where('name','manager');
        })->get();

        return view('admin.projects.create',compact('managers'));
    }

    public function create(Request $request)
    {

        $imagePath = '';
        if ($request->hasFile('documentation')) {
            $file = $request->file('documentation');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project_documentations'), $fileName);
                $imagePath = 'project_documentations/' . $fileName;
            }
        }

        Project::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'manager_id'=>$request->manager_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'documentation'=>$imagePath
        ]);

        session()->flash('success', 'New Project Created Successfully!');
    
        return redirect()->route('admin.project.show');
    }

    public function getUsersByManager($managerId)
    {
        $users = User::with('personalInfo','jobInfo')->whereHas('jobInfo', function ($query) use ($managerId) {
            $query->where('manager_id', $managerId);
        })->get();

        return $users;

        return response()->json($users);
    }

    public function update_form($id)
    {
        $data = Project::find($id);

        $managers = User::whereHas('role', function($query) {
            $query->where('name','manager');
        })->get();

        return view('admin.projects.update',compact('data','managers'));
    }

    public function update(Request $request)
    {

        $imagePath = '';
        if ($request->hasFile('documentation')) {
            $file = $request->file('documentation');
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project_documentations'), $fileName);
                $imagePath = 'project_documentations/' . $fileName;
            }
        }

        Project::where('id',$request->id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'manager_id'=>$request->manager_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'documentation'=>$imagePath
        ]);

        session()->flash('success', 'Project Updated Successfully!');
    
        return redirect()->route('admin.project.show');
    }

    public function delete($id)
    {
        Project::find($id)->delete();

        session()->flash('success', 'Project Deleted Successfully');
    
        return redirect()->route('admin.project.show');
    }

    public function changeStatus($id)
    {
        $status = Project::where('id',$id)->first();

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
