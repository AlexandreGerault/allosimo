<?php

namespace Tests\Feature;

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
}
