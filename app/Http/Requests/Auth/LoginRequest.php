<?php

namespace App\Http\Requests\Auth;

use App\Rules\phoneAndEmail;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'data_login' => ['required', 'string', new phoneAndEmail],
            'password'   => ['required ', ' string']
        ];
    }
}
