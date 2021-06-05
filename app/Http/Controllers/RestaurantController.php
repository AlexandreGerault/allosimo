<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;

class RestaurantController extends Controller
{
    public function show(Restaurant $restaurant): View
    {
        $restaurant->load(['products.options.category']);
        $categories = $restaurant->products->groupBy(fn (Product $product) => $product->category->name);

        return view('restaurants.show')->with('restaurant', $restaurant)->with('categories', $categories);
    }
}
