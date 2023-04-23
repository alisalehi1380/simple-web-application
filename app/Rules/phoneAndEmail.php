<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

// Checks the EMAIL & phoneNumber format is correct or not
class phoneAndEmail implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        if (is_numeric($value) && !str_starts_with($value, '09')) {
            $fail('فرمت شماره موبایل صحیح نیست');
        } elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $fail('فرمت ایمیل صحیح نیست');
        }
    }
}
