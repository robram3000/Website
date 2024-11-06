<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\User; // Assuming you have a User model


class EmailController
{
    public function sendOtp(Request $request)
    {
        $otp = rand(100000, 999999);
        $user = User::where('email', $request->email)->first();
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10); 
        $user->save();

        Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json(['message' => 'OTP sent to your email.']);
    }
}
