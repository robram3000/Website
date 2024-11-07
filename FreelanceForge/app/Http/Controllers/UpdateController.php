<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail; 
use App\Models\AccountDetailAuth;

class UpdateController 
{ 
    public function updateOtp($email, $otp , $randomNumber)
    {
       
        $user = AccountDetailAuth::where('email', $email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found in the database.']);
        }
        
        $user->update(['otp' => $otp]);
        
        return (new EmailController)->sendOtp($email, $otp , $randomNumber);
    }

    public function UpdateOtpToNull($otp , $randomnumber ){
        
        $user = AccountDetailAuth::where('otp' , $otp)->first();
        if(!$user)
        {
            return back()->withErrors(['otp' => 'otp not match']);
        }        

        $user->update(['otp' => null,
                        'otp_expires_at' => null]);

        return redirect()->route('Change.password' , $randomnumber);

    }
  


}
