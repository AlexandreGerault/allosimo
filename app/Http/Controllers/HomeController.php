<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $restaurants = Restaurant::query()
                                 ->where('type', '=', 'restaurant')
                                 ->where('town', '=', 'Mohammédia')
                                 ->whereNotIn('name', ['Tacos Only', 'Pizza Only', 'Tacos Au Charbon'])
                                 ->latest()
                                 ->get();
        $bakeries    = Restaurant::query()
                                 ->where('type', '=', 'bakery')
                                 ->where('town', '=', 'Mohammédia')
                                 ->whereNotIn('name', ['Tacos Only', 'Pizza Only', 'Tacos Au Charbon'])
                                 ->latest()
                                 ->get();

        return view('home')->with('restaurants', $restaurants)->with('bakeries', $bakeries);
    }
}
