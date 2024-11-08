<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AccountDetailAuth;

class AuthController
{
    /*
        emailAuth
        - Verifies if the provided email exists in the database.
        - If the email is found, it triggers the OTP update process.
        - If the email is not found, it returns an error indicating that the email doesn't exist in the database.

        Parameters:
        - $email (string): The email address to be verified.
        - $otp (string): The one-time password that will be updated.
        - $randomnumber (string): A unique random number to be passed along with the OTP.

        Returns:
        - Redirects to the UpdateController’s updateOtp method if the email exists.
        - If not, redirects back with an error message indicating email not found.
    */
    public function emailAuth($email, $otp ,$randomnumber)
    {
        // Check if the user exists in the database with the provided email
        $user = AccountDetailAuth::where('email', $email)->first();
        
        // If the user is not found, return an error
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email not found in the database.']);
        }
        
        // If user found, proceed to update OTP
        return (new UpdateController)->updateOtp($email, $otp , $randomnumber);
    }

    /*
        OneTimePassword
        - Verifies the provided OTP data by comparing it to the stored OTP parts in the database.
        - If the OTP parts match the records, it triggers the UpdateController to nullify the OTP.
        - If the OTP parts do not match, an error message is returned.

        Parameters:
        - $otpData (array): An array of 5 OTP parts to be checked against the database records.
        - $randomnumber (string): A unique random number passed for the verification process.

        Returns:
        - If OTP matches, redirects to UpdateController to nullify OTP.
        - If OTP doesn’t match, redirects back with an error message.
    */
    public function OneTimePassword(array $otpData, $randomnumber)
    {
        // Search for an OTP record in the database matching all 5 OTP parts
        $otpRecord = AccountDetailAuth::where([
            ['otp_part1', '=', $otpData[0]],
            ['otp_part2', '=', $otpData[1]],
            ['otp_part3', '=', $otpData[2]],
            ['otp_part4', '=', $otpData[3]],
            ['otp_part5', '=', $otpData[4]]
        ])->first();
    
        // If no matching OTP record is found, return an error
        if (!$otpRecord) {
            return redirect()->back()->withErrors(['otp' => 'OTP does not match our records.']);
        }
    
        // If OTP is valid, proceed to update and nullify OTP in the database
        return (new UpdateController)->UpdateOtpToNull($otpData, $randomnumber);
    }
}
