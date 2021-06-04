<?php

namespace Tests\Feature;

use App\Models\Restaurant;
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
}
