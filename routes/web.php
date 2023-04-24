<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\UserPanel\UserPanelController;
use Illuminate\Support\Facades\Route;


// Auth
Route::middleware('guest')->group(function () {
    //login
    Route::view('login', 'Auth.login')->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');


    //login by Google
    Route::get('auth/login-google', [LoginController::class, 'loginByGoogle'])->name('loginByGoogle');
    Route::get('auth/google/callback', [LoginController::class, 'redirectFromGoogle']);


    //password
    Route::prefix('password')->group(function () {

        Route::view('forget-password', 'Auth.forgetPassword')->name('forget.password');
        Route::post('forget-password', [ForgetPasswordController::class, 'sendForgetPasswordSMS'])->name('forgetPassword.sendForgetPasswordSMS');
        Route::post('forget-password/confirm', [ForgetPasswordController::class, ''])->name('forgetPassword.');

    });
});

//logout
Route::middleware('auth')->prefix('auth')->get('logout', [LoginController::class, 'logout'])->name('logout');

//Dashboard
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserPanelController::class, 'index'])->name('user.panel');

    });
    Route::prefix('admin')->middleware('admin')->group(function () { //todo create middleware 'Admin'
    });

});


// website
//Route::get('/', [websiteController::class , 'index'])->name('website');


Route::get('test', [LoginController::class, 'test'])->name('test');


