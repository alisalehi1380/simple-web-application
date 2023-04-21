<?php


use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LoginController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::get('activation/{token}', [RegisterController::class, 'activationEmail'])->name('register.email');


        Route::post('login', [LoginController::class, 'login'])->name('register.email');
});
