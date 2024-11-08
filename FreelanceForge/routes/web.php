<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

/*
    Home route: This is the landing page of the site
    which will call the 'Base' method in PagesController to render the homepage.
*/
Route::get('/', [PagesController::class, 'Base'])->name('home');

/*
    Role route: This route allows the user to select their role
    (Client or Freelancer) and passes a random number for additional validation.
*/
Route::get('/Role/{randomnumber}', [PagesController::class, 'role'])->name('role');

/*
    Register route: Displays the registration form and includes the random number
    for validation purposes.
*/
Route::get('/register/{randomnumber}', [PagesController::class, 'registerForm'])->name('register.form');

/*
    Register data route: This handles the POST request for storing the registration data.
*/
Route::post('/RegisterData/{randomnumber}', [PostsController::class, 'registerStoreData'])->name('registerStore.Data');

/*
    Password form route: Displays the form for creating a new password.
*/
Route::get('/Password/{randomnumber}', [PagesController::class, 'PasswordForm'])->name('Password.Form');

/*
    Password data route: This handles the POST request for storing the password data.
*/
Route::post('/PasswordData', [PostsController::class, 'PasswordStoreData_EmailStoreData'])->name('PasswordStore.Data');

/*
    Login form route: Displays the login form where users can log in.
*/
Route::get('/login', [PagesController::class, 'loginForm'])->name('login');

/* Footer routes: These are various routes for different sections of the footer. */
Route::get('/GetInTouch', [PagesController::class, 'getInTouch'])->name('GetInTouch');
Route::get('/AboutUs', [PagesController::class, 'Aboutus'])->name('AboutUs');
Route::get('/TermsAndCondition', [PagesController::class, 'Termsandcondition'])->name('termandcondition');
Route::get('/ContactUs', [PagesController::class, 'ContactUs'])->name('ContactUs');
Route::get('/FAQS', [PagesController::class, 'FAQS'])->name('FAQS');

/* Forgot password routes: These routes are related to resetting the user's password. */
Route::get('/Sending-Email/{randomnumber}', [PagesController::class, 'SendEmail'])->name('Send.Email');
Route::post('/Email-Data/{randomnumber}', [PostsController::class, 'EmailSendingOtp'])->name('Emailsending.Otp');
Route::get('/Otp-Verfication/{randomnumber}', [PostsController::class, 'OtpVerification'])->name('Otp.Verification');
Route::post('/VerifyUserOtp/{randomnumber}', [PostsController::class, 'OneTimePassword'])->name('OneTime.Password');

/*
    Client-related routes for Post, Get, and Update operations will be defined here.
*/

