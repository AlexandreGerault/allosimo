<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Str;

class OrderObserver
{
    public function creating(Order $order)
    {
        $order->number = Str::random(8);
    }

    public function created(Order $order)
    {
    }

    public function updated(Order $order)
    {
    }

    public function deleted(Order $order)
    {
    }

    public function restored(Order $order)
    {
    }

    public function forceDeleted(Order $order)
    {
    }
}
