<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;


Route::get('/', [PagesController::class, 'Base'])->name('home');
Route::get('/register', [PagesController::class, 'registerForm'])->name('register');
Route::get('/login', [PagesController::class, 'loginForm'])->name('login');
Route::get('/Role', [PagesController::class, 'role'])->name('role');




// footer
Route::get('/GetInTouch', [PagesController::class, 'getInTouch'])->name('GetInTouch');
Route::get('/AboutUs', [PagesController::class, 'Aboutus'])->name('AboutUs');
Route::get('/TermsAndCondition', [PagesController::class, 'Termsandcondition'])->name('termandcondition');
Route::get('/ContactUs', [PagesController::class, 'ContactUs'])->name('ContactUs');
Route::get('/FAQS', [PagesController::class, 'FAQS'])->name('FAQS');