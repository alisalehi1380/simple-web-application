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
        $phone_number = $request->phone_number;
        $cache = cache()->get('forgetPassword-' . $phone_number);

        if (isset($cache) && $cache > 4) {
            toast("تعداد تلاش های شما بیش از حد مجاز بوده است !<br/> لطفا 30 دقیقه صبر کنید", 'error');
            return redirect()->route('forgetPassword');
        }

        $user = $this->getUser($request);
        $this->tokenGenerator(10000, 99999, new Tokens(), $user);
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
            $findTokenInDatabase = Tokens::where('user_id', $user->id)->where('type', 'forget_password')->latest()->first();
            $tokenInDatabase = $findTokenInDatabase->token;
            $token_code = $request->input('token');
            if ($tokenInDatabase === $token_code) {
                $now = Carbon::now();
                $created_at = $findTokenInDatabase->created_at;
                $expire_at = Carbon::parse($created_at)->addMinutes(2);
                if ($now <= $expire_at) {
                    if (\auth()->loginUsingId($user->id)) {
                        session()->forget('phone_number');
                        cache()->forget('forgetPassword-' . $phone_number);
                        Tokens::where('token', $tokenInDatabase)->delete();
                    toast('با موفقیت وارد شدید.', 'success');
                    return redirect()->route('dashboard.user'); //todo
                    }
                } else {
                    toast('زمان انقضا کد به پایان رسیده است. لطفا مجددا امتحان کنید', 'error');
                    session()->forget('phone_number');
                    return redirect()->route('forgetPassword');
                }
            } else {
                toast('کد وارد شده صحیح نیست.', 'error');
                return redirect()->back();
            }
        } else {
            toast("تعداد تلاش های شما بیش از حد مجاز بوده است !<br/> لطفا 30 دقیقه دیگر مجددا امتحان کنید", 'error');
            return redirect()->route('forgetPassword');
        }

    }

    /**
     * @param string $min
     * @param string $max
     * @param object $table
     * @param User $user
     * @return void
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
