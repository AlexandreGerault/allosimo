<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update']);
        $this->authorizeResource(Restaurant::class);
    }

    public function index(Request $request): View
    {
        $restaurants = Restaurant::query()->simplePaginate(12);

        return view('restaurant.index')->with('restaurants', $restaurants);
    }

    public function create(): View
    {
        return view('restaurant.create');
    }

    public function store(CreateRestaurantRequest $request): RedirectResponse
    {
        $request->file('logo')->storeAs('restaurants', $request->name);
        Restaurant::create($request->except('logo'));

        return redirect()->route('restaurant.index');
    }

    public function show(Restaurant $restaurant)
    {
        //
    }

    public function edit(Restaurant $restaurant)
    {
        //
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
