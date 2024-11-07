<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;


class EmailController
{
    public function sendOtp($email, $otp)
    {
        // Send OTP email using OtpMail mailable
        Mail::to($email)->send(new OtpMail(['otp' => $otp]));
        
        // Check if email sending was successful
        if (Mail::failures()) {
            return back()->withErrors(['email' => 'Failed to send OTP.']);
        }

        return back()->with('success', 'OTP sent successfully!');
    }

}
