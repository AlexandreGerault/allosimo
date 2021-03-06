<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $admin = User::firstOrCreate(
            [
                'name'     => 'Administrateur',
                'email'    => 'gerault-alexandre@orange.fr',
                'password' => Hash::make('admin'),
                'address'  => 'Rue des tilleuls',
                'town'     => 'Paris',
                'phone'    => '06 31 31 31 31'
            ]
        );
        $admin->assignRole('administrateur');

        $admin = User::firstOrCreate(
            [
                'name'     => 'Client',
                'email'    => 'client@orange.fr',
                'password' => Hash::make('client'),
                'address'  => 'Rue des tilleuls',
                'town'     => 'Marseille',
                'phone'    => '06 31 31 31 31'
            ]
        );
        $admin->assignRole('client');

        $this->call(ProductCategorySeeder::class);
        $this->call(RestaurantSeeder::class);
    }
}
