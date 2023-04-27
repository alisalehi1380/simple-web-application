<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\forgetPasswordConfirmTokenRequest;
use App\Http\Requests\Auth\forgetPasswordRequest;
use App\Models\Tokens;
use App\Models\User;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    public function sendSMS(forgetPasswordRequest $request)
    {
        $user = $this->getUser($request);
        $this->tokenGenerator(10000, 99999, new Tokens(), $user);
        session()->put('phone_number', $request->phone_number);
//        cache()->put('forgetPassword-'.$request->phone_number , 0);
        cache()->increment('forgetPassword-'.$request->phone_number , 1);
        return redirect()->route('forgetPassword.interCode');
    }

    public function confirmCode(forgetPasswordConfirmTokenRequest $request)
    {
        $phone_number = session()->get('phone_number');
        $token_code = $request->input('token');
        $user = User::where('phone_number', $phone_number)->first();
        $findTokenInDatabase = Tokens::where('user_id', $user->id)->where('type', 'forget_password')->latest()->first();
        $tokenInDatabase = $findTokenInDatabase->token;
        $created_at = $findTokenInDatabase->created_at;
        $expire_at = Carbon::parse($created_at)->addMinutes(2);
        $now = Carbon::now();
        $cache = cache()->get('forgetPassword-'.$phone_number);


        if ($cache < 4){
            if ($tokenInDatabase === $token_code) {
                if ($now <= $expire_at) {
                    \auth()->loginUsingId($user->id);
                    session()->forget('phone_number');
                    cache()->forget('forgetPassword-'.$phone_number);
                } else {
                    toast('زمان انقضا کد به پایان رسیده است. لطفا مجددا امتحان کنید', 'error');
                    session()->forget('phone_number');
                    return redirect()->route('forgetPassword');
                }
            }else{
            toast('کد وارد شده صحیح نیست.', 'error');
            return redirect()->back();
            }
        }else{
            // todo handle after 30 mints to retry
            toast('تعداد تلاش های شما بیش از حد مجاز است! لطفا 30 دقیقه دیگر مجدد امتحان کنید', 'error');
            return redirect()->route('forgetPassword');
        }

    }

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
