<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;


class ContactUsController extends Controller
{
    public function create(Request $request)
    {
        ContactUs::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
        ]);

        Mail::send(
            'mails.contactus',
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'message1' => $request->message,
            ],
            function ($message) use ($request) { 
                $message->from($request->email,'LockMyTime');
                $message->to('test@api.lockmytimes.com');
                $message->replyTo($request->email);
                $message->subject('Contact');
            }
        );

        return response()->json(['message'=>'Submited Successfully!']);
    }
}
