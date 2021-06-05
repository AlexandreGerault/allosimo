<?php

namespace App\Http\Controllers;

use App\DTOs\CartLine;
use App\Models\Order;
use App\Models\OrderLine;
use App\Services\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Cart $cart): RedirectResponse
    {
        $cart->load();
        $order = auth()->user()->orders()->save(Order::make(['state' => 'confirmed']));
        foreach ($cart->all() as $line) {
            $orderLine = new OrderLine();
            $orderLine->quantity = $line->amount();
            $orderLine->product()->associate($line->product());
            $orderLine->order()->associate($order);
            $orderLine->save();
            $orderLine->options()->sync($line->options()->pluck('id'));
        }
        $cart->flush();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
