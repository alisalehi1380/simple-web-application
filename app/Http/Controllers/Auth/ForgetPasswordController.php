<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\forgetPasswordConfirmTokenRequest;
use App\Http\Requests\Auth\forgetPasswordRequest;
use App\Models\Tokens;
use App\Models\User;

class ForgetPasswordController extends Controller
{
    public function sendSMS(forgetPasswordRequest $request)
    {
        $user = $this->getUser($request);
        $this->tokenGenerator(10000, 99999, new Tokens(), $user);
        return redirect()->route('forgetPassword.interCode', ['phone_number' => $request->phone_number]);
    }

    public function interCode($phone_number)
    {
        return view('Auth.forgetPassword-interCode', ['phone_number' => $phone_number]);
    }

    public function confirmCode(forgetPasswordConfirmTokenRequest $request, $phone_number)
    {
        if (isset($phone_number)) {
            $token_code = $request->input('token');
            $user = User::where('phone_number', $phone_number)->first();
            $token_table = Tokens::where('user_id', $user->id)->where('type', 'forget_password')->latest()->first();
            if (isset($user)) {
                if ($token_table->token === $token_code) {
                    \auth()->loginUsingId($user->id);
                    session()->flashInput(['phone_number']);
                } else {
                    toast('کد وارد شده صحیح نیست', 'error');
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * token generator
     */
    private function tokenGenerator($min, $max, $table, User $user): void
    {
        $token = mt_rand($min, $max);
        $table::create([
            'user_id' => $user->id,
            'token'   => $token,
            'type'    => 'forget_password'
        ]);
    }

    /**
     * check phone_number user verified & return user
     */
    private function getUser(forgetPasswordRequest $request)
    {
        $phone_number = $request->input('phone_number');
        $user = User::where('phone_number', $phone_number)->where('phone_number_verified_at', true)->first();
        return $user;
    }
}
