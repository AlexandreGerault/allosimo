<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TacosAndPizzasOnlyController extends Controller
{
    public function __invoke(Request $request): View
    {
        $restaurants = Restaurant::query()
                                 ->where('name', '=', 'Pizza Only')
                                 ->orWhere('name', '=', 'Tacos Only')
                                 ->latest()
                                 ->get();

        return view('tacos')->with('restaurants', $restaurants);
    }
}
