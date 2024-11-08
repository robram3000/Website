<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Exception;

class EmailController
{
   
    public function sendOtp($email, $otp, $randomNumber) {
        try {
            Mail::to($email)->send(new OtpMail(['otp' => $otp]));
            return redirect()->route('Otp.Verification', ['randomnumber' => $randomNumber] , $email);
        } catch (Exception $e) {
            return back()->withErrors(['email' => 'Failed to send OTP: ' . $e->getMessage()]);
        }
    }




}