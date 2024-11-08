<?php

namespace App\Http\Controllers;


use App\Models\AccountDetailAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
        session(['email' => $email]);
        
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
    public function nullifyOtp($otpRecord, $randomnumber)
    {
        // Update the OTP record to nullify OTP and its expiration time
        $otpRecord->update([
            'otp' => null,
            'otp_expires_at' => null
        ]);
    
        // Redirect to the password change route
        return redirect()->route('Change.Password', ['randomnumber' => $randomnumber]);
    }



    public function UpdateOldPassword($newPassword)
    {
        // Retrieve the email from the session
        $email = session('email');  // or Session::get('email');
        
        // Check if the email exists in the session
        if (!$email) {
            return redirect()->back()->withErrors(['error' => 'Email not found in session.']);
        }
    
        // Find the user by the email retrieved from the session
        $user = AccountDetailAuth::where('email', $email)->first();
        
        // Check if the user exists
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not authenticated.']);
        }
    
        // Update the user's password with a hashed version of the new password
        $user->update([
            'password' => Hash::make($newPassword),
        ]);
    
        // Return true or any other desired outcome (e.g., redirect)
        return true;  
    }
}
