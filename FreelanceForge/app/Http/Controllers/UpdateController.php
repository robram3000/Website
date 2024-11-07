<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\AccountDetailAuth;
use App\Mail\OtpMail; 

class UpdateController 
{ 
    public function updateOtp($email ,$otp)
    {
        $user = AccountDetailAuth::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not found in the database.']);
        }
        $user->update(['otp' => $otp]);
        return (new EmailController)->sendOtp($email, $otp);
    }
}
