<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
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
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'password'     => bcrypt($request->password),
        ]);

        auth()->login($user);
    }


    //TODO حتما یوزر باید شماره موبایل شو تایید کنه
}
