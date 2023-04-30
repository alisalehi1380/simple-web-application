<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class alisalehiUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'               => 'علی',
            'last_name'                => 'صالحی',
            'email'                    => 'a@gmail.com',
//            'email_verified_at'        => '',
            'phone_number'             => '09306909447',
            'phone_number_verified_at' => true,
            'password'                 => bcrypt('123456789'),
        ]);
    }
}
