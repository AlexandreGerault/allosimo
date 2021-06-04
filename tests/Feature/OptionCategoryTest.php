<?php

namespace Tests\Feature;

use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Tests\Traits\HasAdminAreas;

class OptionCategoryTest extends TestCase
{
    use HasAdminAreas;

    protected Restaurant $restaurant;

    protected function setUp(): void
    {
        parent::setUp();

        $this->restaurant = Restaurant::factory()->create();
        $this->createPage = route('admin.restaurant.option-category.create', ['restaurant' => $this->restaurant]);
        $this->storePage  = route('admin.restaurant.option-category.store', ['restaurant' => $this->restaurant]);
    }

    /**
     * CREATE TESTS
     */
    public function test_an_admin_can_store_an_options_category()
    {
        $this->actAsAdmin();
        $inputs = OptionCategory::factory()->raw();

        $response = $this->post($this->storePage, $inputs);

        $response->assertRedirect();
        $this->assertDatabaseHas('option_categories', Arr::except($inputs, 'restaurant_id'));
    }

    /**
     * UPDATE TESTS
     */
    public function test_an_admin_can_edit_an_option_category()
    {
        $this->actAsAdmin();
        $category = OptionCategory::factory()->create();

        $response = $this->get(
            route(
                'admin.restaurant.option-category.edit',
                ['restaurant' => $category->restaurant, 'option_category' => $category]
            )
        );

        $response->assertSuccessful();
        $response->assertSee($category->name);
    }

    public function test_an_admin_can_update_an_option_category()
    {
        $this->actAsAdmin();
        $category = OptionCategory::factory()->create();
        $inputs   = OptionCategory::factory()->raw();

        $response = $this->put(
            route('admin.restaurant.option-category.update', [$category->restaurant, $category]),
            $inputs
        );

        $response->assertRedirect();
        $this->assertDatabaseHas('option_categories', Arr::except($inputs, 'restaurant_id'));
    }
}
