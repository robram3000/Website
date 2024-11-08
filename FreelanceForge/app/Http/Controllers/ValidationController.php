<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationController extends PagesController
{
    /*
        validateRegistrationData
        - Validates the registration data provided by the user.
        - Ensures that the required fields (Firstname, Lastname, Age, etc.) are filled correctly.
        - The 'Phonenumber' field is optional, but if provided, it cannot exceed 15 characters.
        
        Parameters:
        - $request: Contains the user input for registration.

        Returns:
        - A Validator instance that checks the data against specified rules.
    */
    public function validateRegistrationData(Request $request)
    {
        return Validator::make($request->all(), [
            'Firstname' => 'required|string|max:50',
            'Lastname'  => 'required|string|max:50',
            'Age'       => 'required|integer|min:1|max:120',
            'Birthday'  => 'required|date',
            'Address'   => 'required|string|max:100',
            'Phonenumber' => 'nullable|string|max:15',
        ]);
    }

    /*
        ValidateIdentifyPassword
        - Validates the password and confirm password fields during user registration.
        - Ensures that the password is at least 8 characters long and contains an uppercase letter, a lowercase letter, and a number.
        - Confirms that the password and confirm password fields match.
        
        Parameters:
        - $request: Contains the user input for password and confirmation.

        Returns:
        - A Validator instance that checks the password and confirm password fields.
        - If validation fails, it returns the error messages for the user to correct.
    */
    public function ValidateIdentifyPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Password' => [
                'required',
                'string',
                'min:8',          
                'regex:/[A-Z]/',  // At least one uppercase letter
                'regex:/[a-z]/',  // At least one lowercase letter
                'regex:/[0-9]/',  // At least one number
            ],
            'ConfirmPassword' => 'required|same:Password',
        ], [
            'Password.required' => 'Password is required.',
            'Password.min' => 'Password must be at least 8 characters long.',
            'Password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, and one number.',
            'ConfirmPassword.required' => 'Confirm Password is required.',
            'ConfirmPassword.same' => 'Confirm Password must match Password.',
        ]);

        if ($validator->fails()) {
            return $validator; // Return validation errors if they exist
        }

        return $validator; // Return successful validation if no errors
    }

    /*
        ValidateEmail
        - Validates the email address during user registration.
        - Ensures that the email is required, valid, not exceeding 255 characters, and unique in the users table.
        
        Parameters:
        - $request: Contains the email provided by the user.

        Returns:
        - A Validator instance that checks the email field against specified rules.
        - If validation fails, it returns the error messages for the user to correct.
    */
    public function ValidateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'Email',                 // Must be a valid email address
                'max:255',               // Cannot exceed 255 characters
                'unique:users,email',    // Must be unique in the users table
            ],
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address cannot exceed 255 characters.',
            'email.unique' => 'This email is already registered.',
        ]);

        if ($validator->fails()) {
            return $validator; // Return validation errors if they exist
        }

        return $validator; // Return successful validation if no errors
    }
}
