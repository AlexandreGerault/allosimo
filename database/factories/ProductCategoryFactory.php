<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }

    public function withProducts(int $quantity): ProductCategoryFactory
    {
        return $this->has(Product::factory()->count($quantity));
    }
}
