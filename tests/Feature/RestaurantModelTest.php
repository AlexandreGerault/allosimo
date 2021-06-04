<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantModelTest extends TestCase
{
    public function test_a_restaurant_can_have_product_categories()
    {
        $restaurant = Restaurant::factory()->create();
        $restaurant->products()->createMany(Product::factory()->times(3)->raw());

        $this->assertInstanceOf(Product::class, $restaurant->products()->first());
    }
}
