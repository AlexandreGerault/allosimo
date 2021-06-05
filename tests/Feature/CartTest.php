<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\Product;
use Tests\TestCase;

class CartTest extends TestCase
{
    public function test_a_user_can_add_a_product_to_the_cart()
    {
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
}
