<?php

namespace App\Services;

use App\DTOs\CartLine;
use App\Models\Option;

class Cart
{
    protected array $lines;

    public function __construct(?array $lines = null)
    {
        $this->lines = $lines ?? [];
    }

    public function load()
    {
        $this->lines = session()->get('cart')?->all() ?? [];
    }

    public function add(CartLine $line)
    {
        $this->lines[] = $line;
    }

    public function all(): array
    {
        return $this->lines;
    }

    public function save(): void
    {
        session()->put('cart', $this);
    }

    public function subTotal(): int
    {
        return array_reduce(
            $this->lines,
            function (int $acc, CartLine $line) {
                return $acc
                       + $line->product()->price * $line->amount()
                       + $line->options()->reduce(
                        function (int $acc, Option $option) use ($line) {
                            return $acc + $option->price * $line->amount();
                        },
                        0
                    );
            },
            0
        );
    }
}
