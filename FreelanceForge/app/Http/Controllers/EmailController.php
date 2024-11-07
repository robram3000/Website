<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Exception;

class EmailController
{
   
    public function sendOtp($email, $otp)
{
    try {
        Mail::to($email)->send(new OtpMail(['otp' => $otp]));

        return redirect()->route('Otp.Verification');
    } catch (Exception $e) {
        \Log::error('OTP Sending Error: ' . $e->getMessage());
        return back()->withErrors(['email' => 'Failed to send OTP: ' . $e->getMessage()]);
    }
}




}