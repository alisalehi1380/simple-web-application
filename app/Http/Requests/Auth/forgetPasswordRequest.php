<?php

namespace App\Http\Requests\Auth;

use App\Rules\phone;
use App\Rules\phoneVerified;
use Illuminate\Foundation\Http\FormRequest;

class forgetPasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'phone_number' => ['required' , new phone ,'exists:users,phone_number' , new phoneVerified]
        ];
    }
}
