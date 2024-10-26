<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/RegisterForm', function () {
    return view('User.RegisterForm');
});

Route::get('/Login', function () {
    return view('User.LoginForm');
});


