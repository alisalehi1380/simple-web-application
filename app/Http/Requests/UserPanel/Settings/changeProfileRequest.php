<?php

namespace App\Http\Requests\UserPanel\Settings;


use App\Rules\phone;
use Illuminate\Foundation\Http\FormRequest;

class changeProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'min:2', 'max:255'],
//            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
//            'phone_number' => ['required', new phone, 'unique:users,phone_number'],
            'profile_image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }
}
