<?php

namespace App\Http\Controllers\Auth;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\forgetPasswordConfirmTokenRequest;
use App\Http\Requests\Auth\forgetPasswordRequest;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    public function sendSMS(forgetPasswordRequest $request)
    {
        $phone_number = $request->input('phone_number');
        $cache = cache()->get('forgetPassword-' . $phone_number);

        if (isset($cache) && $cache > 4) {
            toast(SweetAlertToast::moreThanSpecifiedLimit_tryAfter, 'error');
            return redirect()->route('forgetPassword');
        }

        $user = $this->getUser($request);
        \App\Services\token::tokenGenerator(10000, 99999, Token::class, "$user->id", 'forget-password');
        session()->put('phone_number', $phone_number);
        cache()->put('forgetPassword-' . $phone_number, 0, now()->addMinutes(30));
        cache()->increment('forgetPassword-' . $phone_number, 1);
        return redirect()->route('forgetPassword.interCode');
    }

    public function confirmCode(forgetPasswordConfirmTokenRequest $request)

    {
        $phone_number = session()->get('phone_number');
        $cache = cache()->get('forgetPassword-' . $phone_number);

        if ($cache < 4) {
            $user = User::where('phone_number', $phone_number)->first();
            $findTokenInDatabase = Token::where('user_id', $user->id)->where('type', 'forget_password')->latest()->first();
            $tokenInDatabase = $findTokenInDatabase->token;
            $token_code = $request->input('token');
            if ($tokenInDatabase === $token_code) {
                $now = Carbon::now();
                $created_at = $findTokenInDatabase->created_at;
                $expire_at = Carbon::parse($created_at)->addMinutes(2);
                if ($now <= $expire_at) {
                    auth()->login($user);
                    session()->forget('phone_number');
                    cache()->forget('forgetPassword-' . $phone_number);
                    Token::where('token', $tokenInDatabase)->delete();
//                    return redirect()->route('user.panel'); //todo
                } else {
                    toast(SweetAlertToast::expireTokenTime, 'error');
                    session()->forget('phone_number');
                    return redirect()->route('forgetPassword');
                }
            } else {
                toast(SweetAlertToast::notCorrectInterCode, 'error');
                return redirect()->back();
            }
        } else {
            toast(SweetAlertToast::moreThanSpecifiedLimit_tryAfter, 'error');
            return redirect()->route('forgetPassword');
        }

    }

//    /**
//     * @param string $min
//     * @param string $max
//     * @param object $table
//     * @param User $user
//     * @return void
//     */
//    private function tokenGenerator($min, $max, $table, User $user): void
//    {
//        $token = mt_rand($min, $max);
//        $table::create([
//            'user_id' => $user->id,
//            'token'   => $token,
//            'type'    => 'forget_password'
//        ]);
//    }

    /**
     * check phone_number user verified & return user
     * @param forgetPasswordRequest $request
     * @return object user
     */
    private function getUser(forgetPasswordRequest $request)
    {
        $phone_number = $request->input('phone_number');
        $user = User::where('phone_number', $phone_number)->where('phone_number_verified_at', true)->first();
        return $user;
    }
}
