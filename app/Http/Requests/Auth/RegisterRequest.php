<?php

namespace App\Http\Requests\Auth;

use App\Rules\phone;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name'   => ['required', 'string', 'min:2', 'max:255'],
            'last_name'    => ['required', 'string', 'min:2', 'max:255'],
            'email'        => ['required', 'email', 'unique:users,email', 'max:255'],
            'phone_number' => ['required', new phone, 'unique:users,phone_number'],
            'password'     => ['required ', 'string', 'confirmed', 'min:8', 'max:255']
        ];
    }
}
