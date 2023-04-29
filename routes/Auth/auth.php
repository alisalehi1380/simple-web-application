<?php


// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    //login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');

    //register
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');

    //login by Google
    Route::get('login/google', [LoginController::class, 'loginByGoogle'])->name('loginByGoogle');
    Route::get('auth/google/callback', [LoginController::class, 'redirectFromGoogle']);

    //forget-password
    Route::view('forget-password', 'Auth.forgetPassword')->name('forgetPassword');
    Route::post('forget-password/send-sms', [ForgetPasswordController::class, 'sendSMS'])->name('forgetPassword.sendSMS');
    Route::view('forget-password/confirm', 'Auth.forgetPassword-interCode')->name('forgetPassword.interCode')->middleware(['RedirectIfNotEnterPhoneNumber']);
    Route::post('forget-password/confirm', [ForgetPasswordController::class, 'confirmCode'])->name('forgetPassword.confirmCode');
});

//logout
Route::middleware('auth')->get('logout', [LoginController::class, 'logout'])->name('logout');
