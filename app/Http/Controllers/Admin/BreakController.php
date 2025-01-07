<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Breaks;
use Carbon\Carbon;

class BreakController extends Controller
{
    public function index(Request $request)
    {
        $breaks = Breaks::whereDate('created_at',Carbon::today())->get();
        if ($request->wantsJson()) {
            return response()->json(['breaks'=>$breaks]);  
        }

        return view('admin.breaks.index', compact('breaks')); 
    }

    public function search(Request $request)
    {
        $from_date = Carbon::parse($request->from_date)->startOfDay();
        $to_date = Carbon::parse($request->to_date)->endOfDay();
        $breaks = Breaks::with('user')->where('created_at','>=',$from_date)->where('created_at','<=',$to_date)->get();

        if ($request->wantsJson()) {
            return response()->json(['breaks'=>$breaks]);  
        }

        return view('admin.breaks.index', compact('breaks')); 
    }
}
