<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class LocationController extends Controller
{
    public function index()
    {
        $data = Location::all();

        return response()->json(['data'=>$data]);
    }

    public function create(Request $request)
    {
      $location = Location::create([
            'name'=>$request->name,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'radius'=>$request->radius,
            'status'=>1,
        ]);

        $locationId = $location->id;

        $qrUrl = "https://api.lockmytimes.com/public/api/attendence/time_in/{user_id}/{$locationId}";
        $qrImage = QrCode::format('png')->size(300)->generate($qrUrl);
        // 4. Save QR image to public folder
        $folder = public_path("location_qr_codes");
        $randomString = Str::random(8);
        $fileName = "location_{$randomString}.png";
        $filePath = "{$folder}/{$fileName}";

        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        file_put_contents($filePath, $qrImage);

        // 5. Save file name/path in DB
        $location->qr_code = "location_qr_codes/{$fileName}"; // relative path from public/
        $location->save();

        return response()->json(['message'=>'created successfully']);
    }

    public function detail($id)
    {
        $data = Location::find($id);

        return response()->json(['data'=>$data]);  

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
        $location = Location::find($id);

        if (!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        if ($location->qr_code) {
            $filePath = public_path($location->qr_code);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $location->delete();

        return response()->json(['message' => 'Location deleted successfully']);
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

    public function downloadQrCode($id)
    {
        $location = Location::find($id);

        if (!$location || !$location->qr_code) {
            return response()->json(['message' => 'QR code not found'], 404);
        }

        $filePath = public_path($location->qr_code);

        if (!file_exists($filePath)) {
            return response()->json(['message' => 'QR code file does not exist'], 404);
        }

        $fileName = basename($filePath);

        return response()->download($filePath, $fileName);
    }
}
