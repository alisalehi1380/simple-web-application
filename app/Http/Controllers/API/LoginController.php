<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = validator()->make(
            $request->all(), [
                'email'    => 'required | email',
                'password' => 'required | string',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 401);
        }

        $credentials = [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'چنین کاربری وجود ندارد'
            ], 404);
        } else {
            $user = Auth::user();
        }
        if (!$user->hasVerifiedEmail()) {
            Mail::to($user->email)->send(new verifyEmail($user));
            return response()->json(['massage' => 'لطفا ابتدا ایمیل خود را تایید کنید!']);
        } else {
            return response()->json(['massage' => 'شما وارد شدید !']);
        }

//        $tokenResult = $user->createToken('Login Token');
//        $token = $tokenResult->token;

    }
}
