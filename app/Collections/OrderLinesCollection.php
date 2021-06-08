<?php

namespace App\Collections;

use App\Models\OrderLine;
use Illuminate\Database\Eloquent\Collection;

class OrderLinesCollection extends Collection
{
    public function groupedByRestaurant(): self
    {
        return $this->groupBy(fn (OrderLine $order_line) => $order_line->product->restaurant->name);
    }
}
