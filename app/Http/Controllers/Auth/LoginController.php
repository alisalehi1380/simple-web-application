<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Auth.login');
    }

    //login
    public function login(LoginRequest $request)
    {
        $credentials = $this->credentials($request);

        if (!Auth::attempt($credentials)) {
            toast(SweetAlertToast::pleaseFirstSignup, 'warning');
            return redirect()->route('register');
        }
        toast(SweetAlertToast::loginSuccess, 'success');
        return redirect()->route('user.panel');
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

    // set credentials for login [phoneNumber or Email]
    private function credentials(Request $validatedRequest)
    {
        $data_login = $validatedRequest->input('data_login');
        $password = $validatedRequest->input('password');

        if (str_starts_with($data_login, '09')) {
            return ['phoneNumber' => $data_login, 'password' => $password];
        } elseif (filter_var($data_login, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $data_login, 'password' => $password];
        }
    }


    public function logout()
    {
        session()->flush();
        \auth()->logout();
        return redirect()->route('login');
    }
}
