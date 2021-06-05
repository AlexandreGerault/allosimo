<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductModelTest extends TestCase
{
    public function test_it_belongs_to_a_category()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(ProductCategory::class, $product->category);
    }

    public function test_it_can_have_many_options()
    {
        $product = Product::factory()->has(Option::factory()->count(3))->create();

        $this->assertCount(3, $product->options);
        $this->assertInstanceOf(Option::class, $product->options->first());
    }

    public function test_it_belongs_to_a_restaurant()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Restaurant::class, $product->restaurant);
    }
}
