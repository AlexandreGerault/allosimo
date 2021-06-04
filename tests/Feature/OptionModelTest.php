<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\OptionCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OptionModelTest extends TestCase
{
    public function test_an_option_belongs_to_an_options_category()
    {
        $option = Option::factory()->create();

        $this->assertInstanceOf(OptionCategory::class, $option->category);
    }
}
