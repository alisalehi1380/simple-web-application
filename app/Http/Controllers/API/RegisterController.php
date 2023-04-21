<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'first_name' => 'required | string | max:255',
                'last_name'  => 'required | string | max:255',
                'email'      => 'required | email |unique:users,email| max:255',
                'password'   => 'required | min:6 | confirmed',
            ]
// [
//            'first_name.required' => 'وارد کردن نام الزامی ست',
//            'last_name.required'  => 'وارد کردن نام خانوادگی الزامی ست',
//            'email.required'      => 'وارد کردن ایمیل الزامی ست',
//            'password.required'   => 'وارد کردن پسورد الزامی ست'
//        ]
        );

        if ($validator->fails()) {
            return response()->json(['massage' => $validator->errors()->first()], 400);
        } else {

            $user = User::create([
                'first_name'       => $request->first_name,
                'last_name'        => $request->last_name,
                'email'            => $request->email,
                'password'         => Hash::make($request->password),
                'register_ip'      => $request->ip(),
                'activation_token' => Str::random(60),
            ]);

            // send email verify for new user
            Mail::to($user->email)->send(new verifyEmail($user));

            return response()->json('کاربر با موفقیت در سایت ثبت شد', 201);
        }
    }

    public function activationEmail($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'خطایی پیش آمده لطفا مجدد امتحان کنید'
            ]);
        } else {
            $user->update([
                'activation_token'  => "",
                'email_verified_at' => Carbon::now()->toDateTimeString(),
            ]);
            dd('user Update');
        }
    }
}
