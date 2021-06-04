<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name'                => $this->faker->name,
            'restaurant_id'       => Restaurant::factory()->create()->id,
            'product_category_id' => ProductCategory::factory()->create()->id,
        ];
    }

    public function restaurant(Restaurant $restaurant): ProductFactory
    {
        return $this->state(['restaurant_id' => $restaurant->id]);
    }

    public function category(ProductCategory $category): ProductFactory
    {
        return $this->state(['product_category_id' => $category->id]);
    }
}
