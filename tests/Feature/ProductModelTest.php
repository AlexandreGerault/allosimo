<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
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
}
