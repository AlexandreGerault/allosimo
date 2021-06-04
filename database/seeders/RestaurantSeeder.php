<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        $mcDonalds = Restaurant::create(
            [
                'name'        => "McDonald's",
                "description" => "Chaine de restauration rapide mondialement reconnue",
                "town"        => "Mohammédia",
                "stars"       => 10
            ]
        );
        $mcDonalds->products()->saveMany(
            [
                Product::factory()
                       ->state(['name' => 'Best Of Chicken McNuggets™', 'price' => 46])
                       ->category(
                           ProductCategory::query()->firstOrCreate(['name' => 'Menu'])
                       )->create(),
                Product::factory()
                       ->state(['name' => 'Best Of Double Cheeseburger', 'price' => 48])
                       ->category(
                           ProductCategory::query()->firstOrCreate(['name' => 'Menu'])
                       )->create(),
                Product::factory()
                       ->state(['name' => 'Best Of Filet-O-Fish™', 'price' => 48])
                       ->category(
                           ProductCategory::query()->firstOrCreate(['name' => 'Menu'])
                       )->create(),
                Product::factory()
                       ->state(['name' => 'Best Of McChicken', 'price' => 50])
                       ->category(
                           ProductCategory::query()->firstOrCreate(['name' => 'Menu'])
                       )->create(),
            ]
        );
    }
}
