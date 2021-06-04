<?php

namespace Tests\Feature;

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
}
