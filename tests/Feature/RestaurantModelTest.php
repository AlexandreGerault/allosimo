<?php

namespace Tests\Feature;

use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantModelTest extends TestCase
{
    public function test_a_restaurant_can_have_product_categories()
    {
        $restaurant = Restaurant::factory()->create();
        $restaurant->productCategories()->createMany(ProductCategory::factory()->times(3)->raw());

        $this->assertInstanceOf(ProductCategory::class,$restaurant->productCategories()->first());
    }
}
