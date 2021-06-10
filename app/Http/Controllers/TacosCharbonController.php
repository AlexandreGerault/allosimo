<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TacosCharbonController extends Controller
{
    public function __invoke(Request $request): View
    {
        /** @var Restaurant $restaurant */
        $restaurant = Restaurant::query()
                                 ->where('name', '=', 'Tacos Au Charbon')
                                 ->first();
        $restaurant->load(['products.options.category']);
        $categories = $restaurant->products->groupBy(fn (Product $product) => $product->category->name);

        return view('restaurants.show')
            ->with('theme', 'tacos-charbon')
            ->with('restaurant', $restaurant)
            ->with('categories', $categories);
    }
}
