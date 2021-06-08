<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class OrderModelTest extends TestCase
{
    public function test_it_has_lines()
    {
        $order = Order::factory()
                      ->for(User::factory())
                      ->has(OrderLine::factory()->for(Product::factory())->count(3), 'lines')
                      ->create();

        $this->assertInstanceOf(OrderLine::class, $order->lines->first());
        $this->assertCount(3, $order->lines);
    }

    public function test_it_has_an_order_number()
    {
        $order = Order::factory()
                      ->for(User::factory())
                      ->has(OrderLine::factory()->for(Product::factory())->count(3), 'lines')
                      ->create();

        $this->assertNotNull($order->number);
    }
}
