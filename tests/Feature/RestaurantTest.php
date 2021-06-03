<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    public function test_a_guest_cannot_show_create_restaurant_page()
    {
        $response = $this->get(route('restaurant.create'));

        $response->assertRedirect();
    }

    public function test_a_non_administrator_cannot_show_the_page()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $this->actingAs($user);

        $response = $this->get(route('restaurant.create'));

        $response->assertForbidden();
    }

    public function test_an_administrator_can_show_the_page()
    {
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);

        $response = $this->get(route('restaurant.create'));

        $response->assertSuccessful();
    }
}
