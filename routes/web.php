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
    Route::view('password/forget-password', 'Auth.forgetPassword')->name('forgetPassword');
    Route::post('password/forget-password/sendSMS', [ForgetPasswordController::class, 'sendSMS'])->name('forgetPassword.sendSMS');

    Route::view('password/forget-password/inter-code', 'Auth.forgetPassword-interCode')->name('forgetPassword.interCode')->middleware(['RedirectIfNotEnterPhoneNumber']);
    Route::post('password/forget-password/confirm-code', [ForgetPasswordController::class, 'confirmCode'])->name('forgetPassword.confirmCode');



});

//logout
Route::middleware('auth')->get('logout', [LoginController::class, 'logout'])->name('logout');

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


