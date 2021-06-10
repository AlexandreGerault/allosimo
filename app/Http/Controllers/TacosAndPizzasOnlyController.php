<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TacosAndPizzasOnlyController extends Controller
{
    public function home(Request $request): View
    {
        $restaurants = Restaurant::query()
                                 ->where('name', '=', 'Pizza Only')
                                 ->orWhere('name', '=', 'Tacos Only')
                                 ->latest()
                                 ->get();

        return view('tacos-and-pizza-only.home')
            ->with('theme', 'tacos-and-pizza-only')
            ->with('restaurants', $restaurants);
    }

    public function tacos(): View
    {
        /** @var Restaurant $restaurant */
        $restaurant = Restaurant::query()->where('name', '=', 'Tacos Only')->with(['products.options.category'])->first();
        $categories = $restaurant->products->groupBy(fn (Product $product) => $product->category->name);

        return view('restaurants.show', compact('restaurant', 'categories'));
    }
}
