<?php

use App\Http\Controllers\Website\Weblog\WeblogController;
use Illuminate\Support\Facades\Route;


Route::group([''], function () {
    Route::get('laravel/weblog', [WeblogController::class, 'index'])->name('weblog');

});


//    Route::middleware('admin')->group(function () { //todo create middleware 'Admin'
//    });
//});


// website
//Route::get('/', [websiteController::class , 'index'])->name('website');


//================= test =================
//Route::get('test', [LoginController::class, 'test'])->name('test');
//Route::get('testali', function (){
//   toast( SweetAlertToast::loginSuccess, 'success' );
//    return view('Auth.login');
//});


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
































