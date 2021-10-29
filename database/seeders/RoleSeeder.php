<?php

namespace Database\Seeders;

use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // generate roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        // Role::create(['name' => 'instructor']);
    }
}
