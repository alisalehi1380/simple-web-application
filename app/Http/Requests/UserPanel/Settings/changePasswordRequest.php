<?php

namespace App\Http\Requests\UserPanel\Settings;


use Illuminate\Foundation\Http\FormRequest;

class changePasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'old_password'     => ['required ', 'string', 'min:8', 'max:255'],
            'new_password'     => ['required ', 'string', 'confirmed', 'min:8', 'max:255']
        ];
    }
}
