<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// Auth
Route::prefix('auth')->middleware('guest')->group(function () {
    //login
    Route::view('login', 'Auth.login');
    Route::post('login-post', [LoginController::class, 'login'])->name('login.post');

    //login by Google
    Route::get('login-google', [LoginController::class, 'loginByGoogle'])->name('loginByGoogle');
    Route::get('google/callback', [LoginController::class, 'redirectFromGoogle']);
});


Route::get('test', [LoginController::class, 'test'])->name('test');
