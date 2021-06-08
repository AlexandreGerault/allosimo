<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function __invoke()
    {
        dd(__('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.'));
        $restaurants = Restaurant::query()
                                 ->where('type', '=', 'restaurant')
                                 ->where('town', '=', 'Mohammédia')
                                 ->latest()
                                 ->get();
        $bakeries    = Restaurant::query()
                                 ->where('type', '=', 'bakery')
                                 ->where('town', '=', 'Mohammédia')
                                 ->latest()
                                 ->get();

        return view('home')->with('restaurants', $restaurants)->with('bakeries', $bakeries);
    }
}
