<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $this->admin();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }


    private function admin()
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
