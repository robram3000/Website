<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Exception;

class EmailController
{
    /*
        sendOtp
        - Sends a one-time password (OTP) to the specified email address.
        - Uses Laravel's Mail facade to send an email with the OTP details using the OtpMail mailable.
        - Redirects to the OTP verification page upon successful email dispatch.

        Parameters:
        - $email (string): The recipient's email address.
        - $otp (int): The generated OTP to be sent.
        - $randomNumber (int): A unique identifier passed to the OTP verification route.

        Returns:
        - Redirects to 'Otp.Verification' route if the email is sent successfully.
        - Redirects back with an error message if there is a failure in sending the email.
        
        Exception Handling:
        - Catches and displays any exceptions that occur during the email-sending process.
    */
    public function sendOtp($email, $otp, $randomNumber) {
        try {
            // Send OTP email using OtpMail mailable
            Mail::to($email)->send(new OtpMail(['otp' => $otp]));

            // Redirect to the OTP verification route with the random number and email
            return redirect()->route('Otp.Verification', ['randomnumber' => $randomNumber], $email);

        } catch (Exception $e) {
            // Redirect back with error message if email sending fails
            return back()->withErrors(['email' => 'Failed to send OTP: ' . $e->getMessage()]);
        }
    }
}
