<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Models\AccountDetailAuth;

class DataTransferringController 
{
    /*
        storeAccountDetails
        - Collects data from the session and request to store a new user's account and authentication details.
        - Generates an account number using the generateAccountNo method.
        - Stores the user's personal details (like name, age, address, etc.) in the AccountDetail model.
        - Stores the authentication details (email, password, role, etc.) in the AccountDetailAuth model.
        
        Parameters:
        - $request (Request): The request object containing the email and password input from the user.

        Returns:
        - No explicit return, the data is saved to the database in two separate models (AccountDetail and AccountDetailAuth).
    */
    public function storeAccountDetails(Request $request)
    {
        // Collect user details from the session and prepare them for storage in the AccountDetail model
        $accountDetailData = [
            'account_no' => $this->generateAccountNo(),  // Generate unique account number
            'firstname' => session('Firstname'),
            'lastname' => session('Lastname'),
            'age' => session('Age'),
            'birthday' => session('Birthday'),
            'address' => session('Address'),
            'phone_number' => session('Phonenumber'),
        ];
        
        // Create a new account detail record in the database
        $accountDetail = AccountDetail::create($accountDetailData);

        // Collect authentication details from the request and session, prepare for storage
        $accountDetailAuthData = [
            'account_no' => $accountDetail->account_no,  // Use the newly created account number
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('Password')),  // Encrypt password before saving
            'role_type' => session('Roletype'),  // Role type (user, admin, etc.) from session
            'otp' => null,  // Initially set OTP to null
        ];

        // Create a new account authentication record in the database
        AccountDetailAuth::create($accountDetailAuthData);
    }

    /*
        generateAccountNo
        - Generates a random 4-digit number and prefixes it with 'AN-' to create a unique account number.
        
        Returns:
        - A string representing a unique account number in the format 'AN-xxxx', where 'xxxx' is a random 4-digit number.
    */
    protected function generateAccountNo()
    {
        // Generate a random 4-digit number between 1000 and 9999
        $randomNumber = rand(1000, 9999);
        
        // Return the account number with the prefix 'AN-'
        return 'AN-' . $randomNumber;
    }
}
