<?php

namespace App\Http\Controllers;

use App\DTOs\CartLine;
use App\Http\Requests\AddProductCartRequest;
use App\Http\Requests\RemoveCartLineRequest;
use App\Models\Option;
use App\Models\Product;
use App\Services\Cart;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function __construct(protected Cart $cart)
    {
    }

    public function add(AddProductCartRequest $request, Product $product): RedirectResponse
    {
        $this->cart->load();
        $this->cart->add(
            new CartLine(
                $product,
                Option::query()->whereIn('id', $request->get('options', []))->get(),
                $request->get('quantity')
            )
        );
        $this->cart->save();

        return redirect()->back();
    }

    public function remove(RemoveCartLineRequest $request): RedirectResponse
    {
        $this->cart->load();
        $this->cart->removeLine($request->get('line'));
        $this->cart->save();

        return redirect()->back();
    }
}
