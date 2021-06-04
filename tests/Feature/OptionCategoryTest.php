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

    public function test_an_admin_can_create_an_options_category()
    {
        $this->actAsAdmin();

        $response = $this->get($this->createPage);

        $response->assertSuccessful();
    }

    public function test_an_admin_can_store_an_options_category()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $inputs = OptionCategory::factory()->raw();

        $response = $this->post($this->storePage, $inputs);

        $response->assertRedirect();
        $this->assertDatabaseHas('option_categories', Arr::except($inputs, 'restaurant_id'));
    }
}
