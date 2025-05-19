<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $data = Location::all();

        return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {
        Location::create([
            'name'=>$request->name,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'radius'=>$request->radius
        ]);

        return response()->json(['message'=>'created successfully']);
    }

    public function update(Request $request)
    {
        Location::where('id',$request->location_id)->update([
            'name'=>$request->name,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'radius'=>$request->radius
        ]);

        return response()->json(['message'=>'updated successfully']);
    }

    public function delete($id)
    {
        Location::find($id)->delete();

        return response()->json(['message'=>'deleted successfully']);
    }

    public function changeStatus($id)
    {
        $status = Location::where('id',$id)->first();

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
