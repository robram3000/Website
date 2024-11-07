<?php

namespace App\Http\Controllers;


use App\Http\Controllers\UpdateController;
use Illuminate\Http\Request;  // Make sure to import Mail facade


class PostsController  extends PagesController
{
    protected $validationController;
    protected $updateController;

    public function __construct(ValidationController $validationController , UpdateController $updateController)
    {
        $this->validationController = $validationController;
        $this->updateController = $updateController;

    }


    public function RoletypeData(Request $request)
    {
        $userType = $request->input('userType');
        session(['Roletype' => $userType]);
       
        return redirect()->route('register.form', ['randomnumber' => $request->route('randomnumber')])->with('success', 'Account created successfully!');

    }
    
    public function registerStoreData(Request $request)
    {
     
        $validator = $this->validationController->validateRegistrationData($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

      
        session([
            'Firstname'   => $request->input('Firstname'),
            'Lastname'    => $request->input('Lastname'),
            'Age'         => $request->input('Age'),
            'Birthday'    => $request->input('Birthday'),
            'Address'     => $request->input('Address'),
            'Phonenumber' => $request->input('Phonenumber'),
        ]);

        return redirect()->route('Password.Form', ['randomnumber' => $request->route('randomnumber')])
        ->with('status', 'Please enter you Password !');

    }

    public function PasswordStoreData_EmailStoreData(Request $request)
    {
        $validatorIdentifyPassword = $this->validationController->ValidateIdentifyPassword($request);
        $validatorEmail = $this->validationController->ValidateEmail($request);
        
        if ($validatorIdentifyPassword->fails()) {
            return redirect()->back()->withErrors($validatorIdentifyPassword)->withInput();
        }
        
        if ($validatorEmail->fails()) {
            return redirect()->back()->withErrors($validatorEmail)->withInput();
        }

        $dataTransferringController = new DataTransferringController();
        $dataTransferringController->storeAccountDetails($request);
    
        return redirect()->route('login');
    }
    
    public function emailSendingOtp(Request $request)
    {
        $email = $request->input('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['email' => 'Invalid email format.']);
        }

        $otp = rand(10000, 99999);

        return (new UpdateController)->updateOtp($email, $otp);
    }
  
    
    
    
}
