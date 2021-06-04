<?php

namespace Tests\Feature;

use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OptionCategoryModelTest extends TestCase
{
    public function test_an_option_category_belongs_to_a_restaurant()
    {
        $category = OptionCategory::factory()->create();

        $this->assertInstanceOf(Restaurant::class, $category->restaurant);
    }
}
