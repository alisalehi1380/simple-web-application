<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required | string | max:255',
            'last_name'  => 'required | string | max:255',
            'email'      => 'required | email |unique:users,email| max:255',
            'password'   => 'required | min:6 | confirmed',
        ], [
            'first_name.required' => 'وارد کردن نام الزامی ست',
            'last_name.required'  => 'وارد کردن نام خانوادگی الزامی ست',
            'email.required'      => 'وارد کردن ایمیل الزامی ست',
            'password.required'   => 'وارد کردن پسورد الزامی ست'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'massage' => $validator->errors()->first()
            ]);
        } else {

            User::create([
                'first_name'  => $request->first_name,
                'last_name'   => $request->last_name,
                'email'       => $request->email,
                'password'    => Hash::make($request->password),
                'register_ip' => $request->ip(),
            ]);
            return response()->json('کاربر با موفقیت در سایت ثبت شد', 201);
        }
    }
}
