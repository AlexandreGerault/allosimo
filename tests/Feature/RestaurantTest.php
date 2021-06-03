<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RestaurantTest extends TestCase
{
    /**
     * CREATE A RESTAURANT
     */
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

    public function test_a_guest_cannot_store_a_restaurant()
    {
        $response = $this->post(route('restaurant.store'));

        $response->assertRedirect();
    }

    public function test_a_non_admin_user_cannot_store_a_restaurant()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $this->actingAs($user);

        $response = $this->post(route('restaurant.store'));

        $response->assertForbidden();
    }

    public function test_an_admin_can_store_a_restaurant()
    {
        $this->withoutExceptionHandling();
        Storage::fake('local');
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);

        $logo       = UploadedFile::fake()->image('logo.jpg', 300, 300)->size(100);
        $restaurant = Restaurant::factory()->raw(['logo' => $logo]);

        $response = $this->post(route('restaurant.store'), $restaurant);

        $response->assertRedirect();
        $this->assertDatabaseCount('restaurants', 1);
    }
}
