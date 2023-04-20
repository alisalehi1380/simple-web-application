<?php


use App\Http\Controllers\API\RegisterController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    Route::post('register', [RegisterController::class, 'register'])->name('register');
});
