<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AccountDetailAuth;


class AuthController
{
    public function emailAuth($email, $otp)
    {
        $user = AccountDetailAuth::where('email', $email)->first();
        
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not found in the database.']);
        }
        return (new UpdateController)->updateOtp($email, $otp);
    }


    public function OneTimePassword($otp)
    {
        $otp = AccountDetailAuth::where('otp', $otp)->first();
        
        if (!$otp) {
            return redirect()->back()->withErrors(['email' => 'Email not found in the database.']);
        }
        return (new UpdateController)->updateOtp($email, $otp);
    }


}
