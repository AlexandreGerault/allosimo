<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    public function test_a_guest_cannot_show_create_restaurant_page()
    {
        $response = $this->get(route('restaurant.create'));

        $response->assertRedirect();
    }
}
