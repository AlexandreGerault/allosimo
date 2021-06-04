<?php

namespace Tests\Feature;

use App\Models\OptionCategory;
use App\Models\Product;
use App\Models\Restaurant;
use Tests\TestCase;

class RestaurantModelTest extends TestCase
{
    public function test_a_restaurant_can_have_product_categories()
    {
        $restaurant = Restaurant::factory()->create();
        $products   = Product::factory()->times(3)->restaurant($restaurant)->create();
        $restaurant->products()->saveMany($products);

        $this->assertInstanceOf(Product::class, $restaurant->products()->first());
    }

    public function test_a_restaurant_can_have_many_options_categories()
    {
        $restaurant = Restaurant::factory()->create();
        $categories = OptionCategory::factory()->times(3)->for($restaurant)->create();
        $restaurant->optionCategories()->saveMany($categories);

        $this->assertInstanceOf(OptionCategory::class, $restaurant->optionCategories->first());
    }
}
