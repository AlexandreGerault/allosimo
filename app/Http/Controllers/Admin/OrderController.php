<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class);
    }

    public function index(): View
    {
        $orders = Order::query()->latest()->simplePaginate(6);

        return view('admin.orders.index')->with('orders', $orders);
    }

    public function show(Order $order)
    {
        $order->load(['user', 'lines']);

        return view('admin.orders.show')->with('order', $order);
    }
}
