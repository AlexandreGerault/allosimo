<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\OptionCategory;
use App\Models\Restaurant;
use Tests\TestCase;
use Tests\Traits\HasAdminAreas;

class OptionTest extends TestCase
{
    use HasAdminAreas;

    protected Restaurant $restaurant;
    protected OptionCategory $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->restaurant = Restaurant::factory()->create();
        $this->category   = OptionCategory::factory()->for($this->restaurant)->create();

        $this->createPage = route(
            'admin.restaurant.option-category.option.create',
            [$this->restaurant, $this->category]
        );
        $this->storePage  = route(
            'admin.restaurant.option-category.option.store',
            [$this->restaurant, $this->category]
        );
    }

    public function test_an_admin_can_store_an_option()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $inputs = Option::factory()->for($this->category, 'category')->raw();

        $response = $this->post($this->storePage, $inputs);

        $response->assertRedirect();
        $this->assertDatabaseHas('options', $inputs);
    }

    public function test_an_admin_can_edit_a_category()
    {
        $this->actAsAdmin();
        $option = Option::factory()->for($this->category, 'category')->create();

        $response = $this->get(
            route('admin.restaurant.option-category.option.edit', [$this->restaurant, $this->category, $option])
        );

        $response->assertSuccessful();
        $response->assertSee($option->name);
    }

    public function test_an_admin_can_update_a_category()
    {
        $this->withoutExceptionHandling();
        $this->actAsAdmin();
        $option = Option::factory()->for($this->category, 'category')->create();
        $inputs = Option::factory()->for($this->category, 'category')->raw();

        $response = $this->put(
            route('admin.restaurant.option-category.option.update', [$this->restaurant, $this->category, $option]),
            $inputs
        );

        $response->assertRedirect();
        $this->assertDatabaseHas('options', $inputs);
    }
}
