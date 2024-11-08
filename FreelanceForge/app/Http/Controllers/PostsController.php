<?php

namespace App\Http\Controllers;

// Import necessary classes
use App\Http\Controllers\UpdateController;
use Illuminate\Http\Request;  // Ensure that Request is imported for handling HTTP requests

class PostsController extends PagesController
{
    // Define properties to hold instances of ValidationController and UpdateController
    protected $validationController;
    protected $updateController;

    /**
     * Constructor to initialize dependencies
     * 
     * @param ValidationController $validationController - handles validation-related logic
     * @param UpdateController $updateController - handles update-related logic
     */
    public function __construct(ValidationController $validationController, UpdateController $updateController)
    {
        $this->validationController = $validationController;
        $this->updateController = $updateController;
    }

    /**
     * Stores the user role type in the session and redirects to the registration form.
     * 
     * @param Request $request - HTTP request object containing 'userType' input
     * @return \Illuminate\Http\RedirectResponse - redirects to the 'register.form' route with a success message
     */
    public function RoletypeData(Request $request)
    {
        // Retrieve 'userType' from the request input and store it in the session
        $userType = $request->input('userType');
        session(['Roletype' => $userType]);

        // Redirect to 'register.form' route with a success message
        return redirect()->route('register.form', ['randomnumber' => $request->route('randomnumber')])
            ->with('success', 'Account created successfully!');
    }
    
    /**
     * Validates and stores registration data, then redirects to the password form.
     * 
     * @param Request $request - contains user inputs for registration details
     * @return \Illuminate\Http\RedirectResponse - redirects to the 'Password.Form' route if validation passes
     */
    public function registerStoreData(Request $request)
    {
        // Validate the registration data using the ValidationController
        $validator = $this->validationController->validateRegistrationData($request);

        // If validation fails, redirect back with error messages and input data
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Store validated registration data in the session
        session([
            'Firstname'   => $request->input('Firstname'),
            'Lastname'    => $request->input('Lastname'),
            'Age'         => $request->input('Age'),
            'Birthday'    => $request->input('Birthday'),
            'Address'     => $request->input('Address'),
            'Phonenumber' => $request->input('Phonenumber'),
        ]);

        // Redirect to the password entry form with a prompt message
        return redirect()->route('Password.Form', ['randomnumber' => $request->route('randomnumber')])
            ->with('status', 'Please enter your Password!');
    }

    /**
     * Validates password and email, then transfers account details if validation passes.
     * 
     * @param Request $request - contains password and email input data
     * @return \Illuminate\Http\RedirectResponse - redirects to the login page upon successful data transfer
     */
    public function PasswordStoreData_EmailStoreData(Request $request)
    {
        // Validate password input
        $validatorIdentifyPassword = $this->validationController->ValidateIdentifyPassword($request);
        // Validate email input
        $validatorEmail = $this->validationController->ValidateEmail($request);

        // Redirect back with errors if password validation fails
        if ($validatorIdentifyPassword->fails()) {
            return redirect()->back()->withErrors($validatorIdentifyPassword)->withInput();
        }

        // Redirect back with errors if email validation fails
        if ($validatorEmail->fails()) {
            return redirect()->back()->withErrors($validatorEmail)->withInput();
        }

        // Transfer account details using DataTransferringController
        $dataTransferringController = new DataTransferringController();
        $dataTransferringController->storeAccountDetails($request);

        // Redirect to login page after successful data transfer
        return redirect()->route('login');
    }

    /**
     * Validates and generates an OTP for email verification.
     * 
     * @param Request $request - contains email input
     * @param int $randomnumber - unique number for session tracking
     * @return \Illuminate\Http\Response - response from UpdateController after updating OTP
     */
    public function emailSendingOtp(Request $request, $randomnumber)
    {
        // Retrieve email input and validate format
        $email = $request->input('email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['email' => 'Invalid email format.']);
        }

        // Generate a 5-digit OTP
        $otp = rand(10000, 99999);

        // Update OTP using UpdateController
        return (new UpdateController)->updateOtp($email, $otp, $randomnumber);
    }

    /**
     * Handles OTP verification by collecting individual digits and passing them to AuthController.
     * 
     * @param Request $request - contains individual OTP digits as separate inputs
     * @param int $randomnumber - unique number for session tracking
     * @return \Illuminate\Http\Response - response from AuthController after OTP verification
     */
    public function OneTimePassword(Request $request, $randomnumber)
    {
        // Collect individual OTP digits from request
        $otpData = [
            $request->input('Firstno'),
            $request->input('Secondno'),
            $request->input('Thirdno'),
            $request->input('Fourthno'),
            $request->input('Fifthno')
        ];

        // Pass the OTP data to AuthController for verification
        return (new AuthController)->OneTimePassword($otpData, $randomnumber);
    }
}
