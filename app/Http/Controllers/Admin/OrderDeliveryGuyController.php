<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssociateOrderDeliveryGuyRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderDeliveryGuyController extends Controller
{
    public function store(AssociateOrderDeliveryGuyRequest $request, Order $order): RedirectResponse
    {
        $order->deliveryGuy()->associate($request->delivery_guy_id);
        $order->save();

        return redirect()->route('admin.orders.index');
    }
}
