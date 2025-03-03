<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breaks;
use App\Models\Time;
use Carbon\Carbon;


class BreakController extends Controller
{

    


    public function index(Request $request, $id)
    {
        $breaks = Breaks::where('time_id',$id)->whereDate('created_at', Carbon::today('Asia/Karachi'))->get();

        if ($request->wantsJson()) {
            return response()->json(['breaks'=>$breaks]);  
        }

        return view('user.breaks.index', compact('breaks')); 
    }

    public function search(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->startOfDay();
        $to_date = Carbon::parse($request->to_date)->endOfDay();
        $breaks = Breaks::with('user')->where('user_id',$id)->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->get();

        if ($request->wantsJson()) {
            return response()->json(['breaks'=>$breaks]);  
        }

        return view('user.breaks.index', compact('breaks')); 
    }

    public function break_in(Request $request,$user_id,$time_id,$break_type)
    {
        $break = new Breaks();
        $break->user_id = $user_id;
        $break->time_id = $time_id;
        $break->type = $break_type;
        $break->time_in = Carbon::now('Asia/Karachi');
        $break->save();

        if ($request->wantsJson()) {
            $response = ['status'=>true,"message" => "Break in Successfully!"];
            return response($response, 200);
            }
    
            session()->flash('success', 'Break in Successfully!');
    
            return redirect()->route('user.break.view',$break->id);
    }

    public function break_view($break_id)
    {
       $break = Breaks::where('id',$break_id)->first();

        $Time_in = Carbon::parse($break->time_in)->toTimeString();
                    
        $Time_now = Carbon::now('Asia/Karachi')->toTimeString();
        $Time_now = Carbon::parse($Time_now);

        $currentBreakTime = $Time_now->diff($Time_in);

        return view('user.breaks.break',compact('currentBreakTime','break'));
    }

    public function break_out(Request $request, $id)
    {
        $break_out = Breaks::where('id', $id)->first();
    
       if (!$break_out) {
            return response()->json(['status' => false, 'message' => 'Break not found'], 404);
        }
    
        $break_out->time_out = Carbon::now('Asia/Karachi');
        $break_out->save();
    
        // $start = Carbon::parse($break_out->time_in);
        // $end = Carbon::parse($break_out->time_out);
    
    
        $Time_in = Carbon::parse($break_out->time_in)->toTimeString();
        $Time_out = Carbon::parse($break_out->time_out)->toTimeString();
        $Time_out = Carbon::parse($Time_out);
        
        $currentTotalTime = $Time_out->diff($Time_in);
        // $currentTotalTime = Carbon::parse($currentTotalTime)->toTimeString();
        
        // $hours = $currentTotalTime->h;
        // $minutes = $currentTotalTime->i;
        // $seconds = $currentTotalTime->s;

        // return $hours.':'.$minutes.':'.$seconds;
    
        $CurrentTime = Time::where('user_id', $break_out->user_id)
            ->whereDate('created_at', Carbon::today('Asia/Karachi'))
            ->where('time_out', null)
            ->first();
        
        if ($CurrentTime) {
            $newStart = Carbon::parse($CurrentTime->time_in)
            ->sub($currentTotalTime);
            
            $CurrentTime->time_in = $newStart;
            $CurrentTime->save();
        }
    
        if ($request->wantsJson()) {
            $response = ['status' => true, "message" => "Break out Successfully!"];
            return response()->json($response, 200);
        }
    
        session()->flash('success', 'Break out Successfully!');
        return redirect()->route('user.dashboard', auth()->user()->id);
    }
    
}
