<?php

namespace Tests\Feature;

use App\Models\Option;
use App\Models\OrderLine;
use App\Models\Product;
use Tests\TestCase;

class OrderLineModelTest extends TestCase
{
    public function test_it_has_a_product()
    {
        $line = OrderLine::factory()->for(Product::factory())->create();

        $this->assertInstanceOf(Product::class, $line->product);
    }

    public function test_it_has_options()
    {
        $options = Option::factory()->count(4);
        $product = Product::factory()->has($options);
        $line    = OrderLine::factory()->for($product)->has(Option::factory())->create();

        $this->assertInstanceOf(Option::class, $line->options->first());
    }
}
