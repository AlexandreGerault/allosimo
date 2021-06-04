<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Tests\Traits\HasAdminAreas;

class RestaurantTest extends TestCase
{
    use HasAdminAreas;

    protected function setUp(): void
    {
        parent::setUp();

        $this->createPage = route('admin.restaurant.create');
        $this->storePage  = route('admin.restaurant.store');
    }

    public function test_an_admin_can_store_a_restaurant()
    {
        Storage::fake('local');
        $this->actAsAdmin();

        $logo       = UploadedFile::fake()->image('logo.jpg', 300, 300)->size(100);
        $restaurant = Restaurant::factory()->raw(['logo' => $logo]);

        $response = $this->post(route('admin.restaurant.store'), $restaurant);

        $response->assertRedirect();
        $this->assertDatabaseCount('restaurants', 1);
    }

    /**
     * EDIT A RESTAURANT
     */
    public function test_a_guest_is_redirected_before_editing_a_restaurant()
    {
        $restaurant = Restaurant::factory()->create();
        $inputs     = Restaurant::factory()->raw();

        $response = $this->get(route('admin.restaurant.edit', $restaurant));
        $response->assertRedirect();

        $response = $this->put(route('admin.restaurant.update', $restaurant), $inputs);
        $response->assertRedirect();
    }

    public function test_a_non_admin_user_cannot_edit_a_restaurant()
    {
        $user = User::factory()->create();
        $user->assignRole('client');
        $this->actingAs($user);

        $restaurant = Restaurant::factory()->create();
        $response   = $this->get(route('admin.restaurant.edit', $restaurant));
        $response->assertForbidden();

        $restaurantInputs = Restaurant::factory()->raw();
        $response         = $this->put(route('admin.restaurant.update', $restaurant), $restaurantInputs);
        $response->assertForbidden();
    }

    public function test_an_admin_user_can_edit_a_restaurant()
    {
        $this->actAsAdmin();
        $restaurant = Restaurant::factory()->create();

        $response = $this->get(route('admin.restaurant.edit', $restaurant));
        $response->assertSuccessful();
        $response->assertSee($restaurant->name);
        $response->assertSee($restaurant->description);
        $response->assertSee($restaurant->type);
        $response->assertSee($restaurant->state);
        $response->assertSee($restaurant->stars);
    }

    public function test_an_admin_user_can_update_a_restaurant()
    {
        $this->actAsAdmin();
        $restaurant = Restaurant::factory()->create();
        $inputs     = Restaurant::factory()->raw();

        $response = $this->put(route('admin.restaurant.update', $restaurant), $inputs);
        $response->assertRedirect();
        $this->assertDatabaseHas('restaurants', $inputs);
    }
}
