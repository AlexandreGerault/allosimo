<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Arr;
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

        $response = $this->get(
            route('admin.restaurant.product.create', $this->restaurant),
            ['restaurant' => $this->restaurant]
        );

        $response->assertSuccessful();
    }

    public function test_an_admin_can_store_a_product()
    {
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);
        $inputs = Product::factory()->raw();

        $response = $this->post(
            route('admin.restaurant.product.store', ['restaurant' => $this->restaurant]),
            $inputs + ['category' => $inputs['product_category_id']]
        );

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('products', Arr::except($inputs, 'restaurant_id'));
    }

    public function test_an_admin_can_update_a_product()
    {
        $user = User::factory()->create();
        $user->assignRole('administrateur');
        $this->actingAs($user);
        $product = Product::factory()->create();
        $inputs  = Product::factory()->raw();

        $response = $this->put(
            route('admin.restaurant.product.update', ['restaurant' => $this->restaurant, $product]),
            $inputs + ['category' => $inputs['product_category_id']]
        );

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('products', Arr::except($inputs, 'restaurant_id'));
    }
}
