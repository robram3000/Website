<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\AccountDetailAuth;
use App\Mail\OtpMail; 

class UpdateController 
{ 
    
    
    public function UpdateOtp($email)
    {
        $user = AccountDetailAuth::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not found in the database.']);
        }

        $otp = mt_rand(100000, 999999); 
        $user->update(['otp' => $otp]);
        Mail::to($user->email)->send(new OtpMail(['otp' => $otp]));

        return redirect()->back()->with('success', 'OTP updated and sent successfully!');
    }
}
