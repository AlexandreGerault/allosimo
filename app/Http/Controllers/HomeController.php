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
                                 ->latest()
                                 ->limit(6)
                                 ->get();
        $bakeries    = Restaurant::query()
                                 ->where('type', '=', 'bakery')
                                 ->where('town', '=', 'Mohammédia')
                                 ->latest()
                                 ->limit(6)
                                 ->get();

        return view('home')->with('restaurants', $restaurants)->with('bakeries', $bakeries);
    }
}
