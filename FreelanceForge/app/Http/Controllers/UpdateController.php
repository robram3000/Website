<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail; 
use App\Models\AccountDetailAuth;

class UpdateController 
{ 

    /*
        updateOtp
        - Generates a one-time password (OTP) and associates it with the user's email.
        - Verifies if the provided email exists in the AccountDetailAuth database.
        - If the email is found, updates the user's OTP in the database.
        - Calls EmailController to send the generated OTP to the user's email address.
        
        Parameters:
        - $email (string): The user's email address to verify and update.
        - $otp (int): The generated OTP to be saved in the user's account.
        - $randomNumber (int): A unique number passed for additional tracking.

        Returns:
        - Redirects back with an error if the email is not found.
        - Calls EmailController to send the OTP if email verification is successful.
    */
    public function updateOtp($email, $otp, $randomNumber)
    {
        // Check if user exists with the provided email
        $user = AccountDetailAuth::where('email', $email)->first();
        
        if (!$user) {
            // Redirect back if email is not found in the database
            return back()->withErrors(['email' => 'Email not found in the database.']);
        }
        
        // Update the user's OTP in the database
        $user->update(['otp' => $otp]);
        
        // Send the OTP email via EmailController
        return (new EmailController)->sendOtp($email, $otp, $randomNumber);
    }

    /*
        UpdateOtpToNull
        - Verifies and nullifies the user's OTP and expiration time after validation.
        - Finds the user based on the individual parts of the OTP stored in the database.
        - If the OTP parts match, sets OTP and OTP expiration time to null in the database.
        - Redirects the user to the 'Change.password' route upon successful validation.

        Parameters:
        - $otpData (array): An array containing the individual parts of the OTP (5 parts).
        - $randomnumber (int): A unique identifier for routing or session tracking.

        Returns:
        - Redirects back with an error message if OTP verification fails.
        - Redirects to 'Change.password' route if OTP is successfully nullified.
    */
    public function UpdateOtpToNull(array $otpData, $randomnumber)
    {
        // Look up the user based on the OTP parts
        $user = AccountDetailAuth::where([
            ['otp_part1', '=', $otpData[0]],
            ['otp_part2', '=', $otpData[1]],
            ['otp_part3', '=', $otpData[2]],
            ['otp_part4', '=', $otpData[3]],
            ['otp_part5', '=', $otpData[4]]
        ])->first();
    
        if (!$user) {
            // Redirect back if OTP does not match
            return redirect()->back()->withErrors(['otp' => 'OTP does not match.']);
        }

        // Nullify the OTP and its expiration time in the database
        $user->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);

        // Redirect to the password change route
        return redirect()->route('Change.password', ['randomnumber' => $randomnumber]);
    }
}
