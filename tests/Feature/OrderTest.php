<?php

namespace Tests\Feature;

use App\DTOs\CartLine;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use App\Services\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_a_guest_cannot_store_an_order()
    {
        $response = $this->post(route('order'));

        $response->assertRedirect();
    }

    public function test_a_user_can_store_an_order()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $product = Product::factory()->has(Option::factory()->count(4))->create();
        $this->session(['cart' => new Cart([new CartLine($product, $product->options, 2)])]);
        $this->actingAs($user);

        $response = $this->post(route('order'));

        $response->assertRedirect();
        $response->assertSessionMissing('cart');
        $this->assertDatabaseHas('orders', ['user_id' => $user->id]);
    }
}
