<?php

namespace App\Rules;

use \App\Models\User;
use Illuminate\Contracts\Validation\InvokableRule;

// Checks the phone_number verified
class phoneVerified implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        User::where('phone_number', $value)->where('phone_number_verified_at', true)->exists() ?: $fail('متاسفانه شما شماره موبایل خود را تایید نکرده اید!');
    }
}
