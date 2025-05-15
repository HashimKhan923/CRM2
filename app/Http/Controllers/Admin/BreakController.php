<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breaks;
use App\Models\Time;
use Carbon\Carbon;

class BreakController extends Controller
{
    public function index(Request $request, $time_id)
    {
        
        $breaks = Breaks::where('time_id',$time_id)->get();
           
        return response()->json(['breaks'=>$breaks]);  

    }

    public function create(Request $request)
    {
        $attendence = Time::where('id',$request->time_id)->first();

        $break = new Breaks();
        $break->user_id = $attendence->user_id;
        $break->time_id = $request->time_id;
        $break->type = $request->break_type;
        $break->time_in = Carbon::parse($request->time_in);
        if($request->time_out)
        {
            $break->time_out = Carbon::parse($request->time_out);

            // $Break_in = Carbon::parse($break->time_in)->toTimeString();
            // $Break_out = Carbon::parse($break->time_out)->toTimeString();
            // $Break_out = Carbon::parse($Break_out);

            // $TotalBreakTime = $Break_out->diff($Break_in);

            // $AttendenceTime = Time::where('id', $request->time_id)->first();

            // $newStart = Carbon::parse($AttendenceTime->time_in)
            // ->sub($TotalBreakTime);

            // $AttendenceTime->time_in = $newStart;
            // $AttendenceTime->save();


        }
        $break->save();

        return redirect()->back();

    }

    public function update(Request $request)
    {

        $break = Breaks::find($request->break_id);
        $break->time_id = $request->time_id;
        $break->type = $request->break_type;
        $break->time_in = Carbon::parse($request->time_in);
        $break->time_out = Carbon::parse($request->time_out);

        // $Break_in = Carbon::parse($break->time_in)->toTimeString();
        // $Break_out = Carbon::parse($break->time_out)->toTimeString();
        // $Break_out = Carbon::parse($Break_out);

        // $TotalBreakTime = $Break_out->diff($Break_in);

        // $AttendenceTime = Time::where('id', $request->time_id)->first();

        // $newStart = Carbon::parse($AttendenceTime->time_in)
        // ->sub($TotalBreakTime);

        // $AttendenceTime->time_in = $newStart;
        // $AttendenceTime->save();

        $break->save();

        return redirect()->back();
    }



    public function search(Request $request)
    {
        $breaks = Breaks::query()->with('user'); // Initialize query with relationship

        if ($request->user_id) {
            $breaks->where('user_id', $request->user_id);
        }
        
        if ($request->from_date) {
            $from_date = Carbon::parse($request->from_date)->startOfDay();
            $breaks->where('created_at', '>=', $from_date);
        }
        
        if ($request->to_date) {
            $to_date = Carbon::parse($request->to_date)->endOfDay();
            $breaks->where('created_at', '<=', $to_date);
        }
        
        // Execute query
        $breaks = $breaks->get();



        if ($request->wantsJson()) {
            return response()->json(['breaks'=>$breaks]);  
        }


        return view('admin.breaks.index', compact('breaks')); 
    }
}
