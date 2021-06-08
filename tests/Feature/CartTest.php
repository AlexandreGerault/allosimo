<?php

namespace Tests\Feature;

use App\DTOs\CartLine;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
use App\Services\Cart;
use Tests\TestCase;

class CartTest extends TestCase
{
    public function test_a_user_can_add_a_product_to_the_cart()
    {
        $this->actingAs(User::factory()->create());
        $product = Product::factory()->has(Option::factory()->count(4))->create();

        $response = $this->post(
            route('cart.add', $product),
            ['quantity' => 12, 'options' => $product->options->pluck('id')]
        );

        $cartLines = session()->get('cart')->all();
        $response->assertRedirect();
        $response->assertSessionHas('cart');
        $this->assertCount(1, $cartLines);
    }

    public function test_a_user_can_remove_an_item_from_cart()
    {
        $this->actingAs(User::factory()->create());
        $product = Product::factory()->has(Option::factory()->count(4))->create();
        $this->session(['cart' => new Cart([new CartLine($product, $product->options, 2)])]);

        $response = $this->post(route('cart.remove'), ['line' => 0]);

        $cartLines = session()->get('cart')->all();
        $response->assertRedirect();
        $this->assertCount(0, $cartLines);
    }
}
