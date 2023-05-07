<?php

namespace App\Http\Controllers\Auth;

use App\Constants\SweetAlertToast;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use function Symfony\Component\String\b;

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
        $existsInDatabase = $this->dataLoginExistsInDatabase($credentials);

        if ($existsInDatabase) {
            if (Auth::attempt($credentials)) {
                toast(SweetAlertToast::loginSuccess, 'success');
                return redirect()->route('userPanel');
            } else {
                toast('رمز وارد شده اشتباه است!', 'error');
                return redirect()->back();
            }
        } else {
            toast(SweetAlertToast::pleaseFirstSignup, 'warning');
            return redirect()->route('register');
        }
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

    public function logout()
    {
        session()->flush();
        \auth()->logout();
        return redirect()->route('login');
    }





//    ------------------------------------ custom function ------------------------------------

    /**
     * set credentials for login [phone_number or Email]
     * @param Request $validatedRequest
     * @return array
     */
    private function credentials(Request $validatedRequest) : array
    {
        $data_login = $validatedRequest->input('data_login');
        $password = $validatedRequest->input('password');

        if (str_starts_with($data_login, '09')) {
            return ['phone_number' => $data_login, 'password' => $password];
        } elseif (filter_var($data_login, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $data_login, 'password' => $password];
        }
    }

    /**
     * check email or phone user exist in database or not
     * @param array $credentials
     * @return bool
     */
    private function dataLoginExistsInDatabase(array $credentials): bool
    {
        if (isset($credentials['email'])) {
            return User::where('email', $credentials['email'])->exists();
        } elseif (isset($credentials['phone_number'])) {
            return User::where('phone_number', $credentials['phone_number'])->exists();
        }
    }
}
