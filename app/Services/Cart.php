<?php

namespace App\Services;

use App\DTOs\CartLine;
use Illuminate\Contracts\Session\Session;

class Cart
{
    protected array $lines;

    public function __construct(protected Session $session)
    {
        $this->lines = $this->session->get('cart')?->all() ?? [];
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
        $this->session->put('cart', $this);
    }
}
