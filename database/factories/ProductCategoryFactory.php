<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'restaurant_id' => Restaurant::factory()
        ];
    }
}
