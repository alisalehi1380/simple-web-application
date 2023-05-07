<?php

namespace App\Http\Controllers\Auth;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Token;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('Auth.register');
    }

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'first_name'               => $request->first_name,
            'last_name'                => $request->last_name,
            'email'                    => $request->email,
            'phone_number'             => $request->phone_number,
            'phone_number_verified_at' => false,
            'password'                 => bcrypt($request->password),
        ]);

        session()->put('phone_number', $request->phone_number);
        \App\Services\token::tokenGenerator('1000', '9999', Token::class, "$user->id", 'phoneNumber-confirm');
        toast(SweetAlertToast::sendTokenConfirmSMS, 'success');
        return redirect()->route('phoneNumber');
    }
}
