<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ValidationController extends PagesController
{
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

    public function ValidateIdentifyPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Password' => [
                'required',
                'string',
                'min:8',          
                'regex:/[A-Z]/',  
                'regex:/[a-z]/',    
                'regex:/[0-9]/',    
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
            return $validator; 
        }

        return $validator;
    }
    public function ValidateEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'Email',                  
                'max:255',                
                'unique:users,email',      
            ],
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address cannot exceed 255 characters.',
            'email.unique' => 'This email is already registered.',
        ]);

       
        if ($validator->fails()) {
            return $validator; 
        }
        return $validator;
    }


    public function ValidateChangePassword(Request $request){
        $validator = Validator::make($request)

    }

}
