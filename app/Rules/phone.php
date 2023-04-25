<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

// Checks the phone_number format is correct or not
class phone implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (!str_starts_with($value, '09')) {
            $fail('شماره موبایل را با 09 وارد کنید');
        } elseif (strlen($value) !== 11) {
            $fail('تعداد ارقام شماره موبایل صحیح نیست');
        }
    }
}
