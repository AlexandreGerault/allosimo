<?php

namespace App\DTOs;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CartLine
{
    public function __construct(protected Product $product, protected Collection $options, protected int $amount)
    {
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function options(): Collection
    {
        return $this->options;
    }

    public function amount(): int
    {
        return $this->amount;
    }
}
