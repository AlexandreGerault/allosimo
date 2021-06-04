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

        $this->createPage = route('admin.productCategory.create');
        $this->storePage = route('admin.productCategory.store');
    }

    public function test_an_admin_can_store_a_category()
    {
        $this->actAsAdmin();
        $inputs = ProductCategory::factory()->raw();

        $response = $this->post($this->storePage);

        $response->assertRedirect();
        $this->assertDatabaseHas('product_categories', $inputs);
    }
}
