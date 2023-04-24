<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\forgetPasswordRequest;
use App\Models\Tokens;
use App\Models\User;

class ForgetPasswordController extends Controller
{
    public function sendForgetPasswordSMS(forgetPasswordRequest $request)
    {
        $phone_number = $request->input('phone_number');
        $user = User::where('phone_number', $phone_number)->where('phone_number_verified_at', true)->first();

//        dd($user->id);
//        $user->phone_number;


        $this->tokenGenerator( 0 , 99999 , new Tokens() , $user);

        dd('done');
    }

    /**
     * token generator
     */
    private function tokenGenerator($min , $max ,$table , User $user): void
    {
        $token = mt_rand($min, $max);
        $table::create([
            'user_id' => $user->id,
            'token'   => $token,
            'type'    => 'forget_password'
        ]);
    }
}
