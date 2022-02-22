<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $users = array(
           // generate sample admin
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com', 
                'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                'is_activated' => 1, 
                'role_id' => 1,
                'created_at' => now()
            ],

          // generate sample user
            [
                'name' => 'Dev Ace',
                'email' => 'user@gmail.com', 
                'password' => '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6',
                'is_activated' => 1, 
                'role_id' => 2,
                'created_at' => now()
            ]
         );

         User::insert($users);

    }
}
