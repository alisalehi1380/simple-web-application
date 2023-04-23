<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\phoneAndEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //login
    public function login(Request $request)
    {
        $request->validate([
            'data_Login' => ['required', 'string', new phoneAndEmail],
            'password'   => 'required | string'
        ]);

    }

    // login by Google
    public function loginByGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // redirect from Google
    public function redirectFromGoogle()
    {
        $user = Socialite::driver('google')->user();

        $user_me = User::where('email', $user->getEmail())->first();

        if ($user_me) {
            Auth::login($user_me);
            return redirect('/welcome');
        }
        alert()->html('چنین کاربری وجود ندارد', "<a class='btn btn-warning' href='/regester'> ثبت نام کنید</a>", 'error');
        return redirect('/login');
    }

    // test
    public function test(Request $request)
    {
//        $request->validate([
//            'data_Login' => 'required | email | exists:users,email',
//            'password' => 'required'
//        ]);
        return view('Auth.login');
    }
}
