<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use App\Models\User;
use Tests\TestCase;
use Tests\Traits\HasAdminAreas;

class ProductTest extends TestCase
{
    use HasAdminAreas;

    protected Restaurant $restaurant;

    protected function setUp(): void
    {
        parent::setUp();

        $this->restaurant = Restaurant::factory()->create();
        $this->createPage = route('admin.restaurant.product.create', ['restaurant' => $this->restaurant]);
        $this->storePage  = route('admin.restaurant.product.store', ['restaurant' => $this->restaurant]);
    }

    public function test_an_administrator_can_show_the_page()
    {
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);

        $response = $this->get(route('admin.restaurant.create'), ['restaurant' => $this->restaurant]);

        $response->assertSuccessful();
    }
}
