<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class);
    }

    public function index(): View
    {
        $query = Order::query()->with(['lines.product.restaurant', 'lines.product.options']);

        if(auth()->user()->hasRole('livreur') && ! auth()->user()->hasRole('administrateur')) {
            $query->whereHas('deliveryGuy', function ($query) {
                return $query->where('id', auth()->id());
            });
        }

        $orders = $query->latest()->paginate(60);

        return view('admin.orders.index')->with('orders', $orders);
    }

    public function show(Order $order): View
    {
        $order->load(['user', 'lines']);

        return view('admin.orders.show')->with('order', $order);
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}
