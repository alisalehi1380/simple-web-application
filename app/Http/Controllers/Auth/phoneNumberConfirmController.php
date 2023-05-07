<?php

namespace App\Http\Controllers\Auth;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\phoneNumberConfirmTokenRequest;
use App\Models\Token;
use App\Models\User;
use Carbon\Carbon;

class phoneNumberConfirmController extends Controller
{

    public function index()
    {
        $phone_number = session()->get('phone_number');
        if (isset($cache) && $cache > 4) {
            toast(SweetAlertToast::moreThanSpecifiedLimit_tryAfter, 'error');
            return redirect()->route('forgetPassword');
        }
        cache()->put('phoneNumberConfirm-' . $phone_number, 0, now()->addMinutes(30));
        cache()->increment('phoneNumberConfirm-' . $phone_number, 1);
        return view('Auth.phoneNumber-interCode');
    }

    public function confirmCode(phoneNumberConfirmTokenRequest $request)
    {
        $phoneNumber = session()->get('phone_number');

        $user = User::where('phone_number', $phoneNumber)->first();
        $findTokenInDatabase = Token::where('user_id', $user->id)->where('type', 'phoneNumber-confirm')->latest()->first();
        $tokenInDatabase = $findTokenInDatabase->token;
        $token_code = $request->input('token');
        if ($tokenInDatabase === $token_code) {
            $now = Carbon::now();
            $created_at = $findTokenInDatabase->created_at;
            $expire_at = Carbon::parse($created_at)->addMinutes(2);
            if ($now <= $expire_at) {
                $user->update([
                    'phone_number_verified_at' => true,
                ]);
                auth()->login($user);
                session()->forget('phone_number');
                Token::where('token', $tokenInDatabase)->delete();
                toast(SweetAlertToast::loginSuccess, 'success');
                return redirect()->route('userPanel');
            } else {
                toast(SweetAlertToast::expireTokenTime, 'error');
                session()->forget('phone_number');
                return redirect()->route('forgetPassword');
            }
        } else {
            toast(SweetAlertToast::notCorrectInterCode, 'error');
            return redirect()->back();
        }
    }
}
