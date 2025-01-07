<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\ProductVariant;
use Carbon\Carbon;

class ShiftController extends Controller
{
    public function index(Request $request)
    {
        $shifts = Shift::all();

        if ($request->wantsJson()) {
            return response()->json(['shifts'=>$shifts]);  
        }

        return view('admin.shifts.index', compact('shifts')); 
    }

    public function create_form()
    {
        return view('admin.shifts.create');
    }

    public function create(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'time_from'=>'required',
            'time_to'=>'required',
        ]);

        $new = new Shift();
        $new->name = $request->name;
        $new->time_from = Carbon::parse($request->time_from)->format('g:i a');
        $new->time_to = Carbon::parse($request->time_to)->format('g:i a');
        $new->save();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "New Shift Created Successfully!"];
            return response($response, 200);
            }
    
            session()->flash('success', 'New Shift Created Successfully!');
    
            return redirect()->route('admin.shift.show');
    }

    public function update_form($id)
    {

        
        $data = Shift::where('id',$id)->first();

        return view('admin.shifts.update',compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'time_from'=>'required',
            'time_to'=>'required',
        ]);

        $update = Shift::where('id',$request->shift_id)->first();
        $update->name = $request->name;
        $update->time_from = Carbon::parse($request->time_from)->format('g:i a');
        $update->time_to = Carbon::parse($request->time_to)->format('g:i a');
        $update->save();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Shift Updated Successfully"];
            return response($response, 200);
            }
    
            session()->flash('success', 'Shift Updated Successfully');
    
            return redirect()->route('admin.shift.show');
    }

    public function delete(Request $request, $id)
    {
        Shift::find($id)->delete();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Shift Deleted Successfully"];
            return response($response, 200);
            }
    
            session()->flash('success', 'Shift Deleted Successfully');
    
            return redirect()->route('admin.shift.show');

    }

    public function changeStatus($id)
    {
        $status = Shift::where('id',$id)->first();

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
