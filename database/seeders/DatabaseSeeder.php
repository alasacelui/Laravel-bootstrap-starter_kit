<?php

namespace Database\Seeders;

use App\Models\Admin\Resident;
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
        // Run Seeders
       
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

    }
}
