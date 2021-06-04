<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'client']);
        Role::firstOrCreate(['name' => 'livreur']);
        Role::firstOrCreate(['name' => 'administrateur']);
    }
}
