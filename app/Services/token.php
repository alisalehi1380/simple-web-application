<?php

namespace App\Services;

use App\Models\User;

class token
{
    /**
     * @param string $min
     * @param string $max
     * @param $model
     * @param string $user_id
     * @param string $type
     * @return void
     */
    public static function tokenGenerator(string $min, string $max, $model, string $user_id, string $type): void
    {
        $token = mt_rand($min, $max);
        $model::create([
            'user_id' => $user_id,
            'token'   => $token,
            'type'    => $type
        ]);
    }
}
