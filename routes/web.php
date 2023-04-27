<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\UserPanel\UserPanelController;
use Illuminate\Support\Facades\Route;


// Auth
Route::middleware('guest')->group(function () {
    //login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');

    //login by Google
    Route::get('login/google', [LoginController::class, 'loginByGoogle'])->name('loginByGoogle');
    Route::get('auth/google/callback', [LoginController::class, 'redirectFromGoogle']); //todo login/google/callback

    //forget-password
    Route::view('forget-password', 'Auth.forgetPassword')->name('forgetPassword');
    Route::post('forget-password/send-sms', [ForgetPasswordController::class, 'sendSMS'])->name('forgetPassword.sendSMS');

    Route::view('forget-password/confirm', 'Auth.forgetPassword-interCode')->name('forgetPassword.interCode')->middleware(['RedirectIfNotEnterPhoneNumber']);
    Route::post('forget-password/confirm', [ForgetPasswordController::class, 'confirmCode'])->name('forgetPassword.confirmCode');


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

//test
Route::get('test', [LoginController::class, 'test'])->name('test');










//-------------------------------------------------------------------------------------------------------------------------

////register
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//
////password
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//
//$this->get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//$this->post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
//
////verify email
//$this->get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//$this->get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
//$this->post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
































