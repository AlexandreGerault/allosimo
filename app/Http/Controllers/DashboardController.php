<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $turnover = Order::query()
                         ->withTrashed()
                         ->whereDate('deleted_at', '>', Carbon::now()->subDays(30)->toDateString())
                         ->get()
                         ->sum(fn(Order $order) => $order->price + 15);

        $delivered = Order::query()
                          ->withTrashed()
                          ->whereDate('deleted_at', '>', Carbon::now()->subDays(30)->toDateString())
                          ->count();

        return view('dashboard', compact('turnover', 'delivered'));
    }
}
