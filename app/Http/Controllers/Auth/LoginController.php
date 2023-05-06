<?php

namespace App\Http\Controllers\Auth;

use App\Constants\SweetAlertToast;
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
        return redirect()->route('userPanel');
    }

    // login by Google
    public function loginByGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // redirect from Google
    public function redirectFromGoogle()
    {
        $google = Socialite::driver('google')->user();
        $user = User::where('email', $google->getEmail())->first();

        if ($user) {
            auth()->login($user);
        }

        alert()->warning('', SweetAlertToast::pleaseFirstSignup);
        return redirect()->route('register');
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


    /**
     * set credentials for login [phoneNumber or Email]
     * @param Request $validatedRequest
     * @return array|void
     */
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
