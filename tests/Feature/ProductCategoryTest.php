<?php

namespace Tests\Feature;

use App\Models\ProductCategory;
use Tests\TestCase;
use Tests\Traits\HasAdminAreas;

class ProductCategoryTest extends TestCase
{
    use HasAdminAreas;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createPage = route('admin.product-category.create');
        $this->storePage  = route('admin.product-category.store');
    }

    public function test_an_admin_can_store_a_category()
    {
        $this->actAsAdmin();
        $inputs = ProductCategory::factory()->raw();

        $response = $this->post($this->storePage, $inputs);

        $response->assertRedirect();
        $this->assertDatabaseHas('product_categories', $inputs);
    }

    public function test_an_admin_can_update_a_category()
    {
        $this->actAsAdmin();
        $productCategory = ProductCategory::factory()->create();
        $inputs          = ProductCategory::factory()->raw();

        $response = $this->put(route('admin.product-category.update', $productCategory), $inputs);

        $response->assertRedirect();
        $this->assertDatabaseHas('product_categories', $inputs);
    }
}
