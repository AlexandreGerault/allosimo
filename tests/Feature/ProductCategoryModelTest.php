<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use Tests\TestCase;

class ProductCategoryModelTest extends TestCase
{
    public function test_a_category_has_products()
    {
        $category = ProductCategory::factory()->withProducts(5)->create();

        $this->assertInstanceOf(Product::class, $category->products->first());
        $this->assertCount(5, $category->products);
    }
}
