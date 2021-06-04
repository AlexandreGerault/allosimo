<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Restaurant::class);
    }

    public function index(): View
    {
        $restaurants = Restaurant::query()->simplePaginate(6);

        return view('admin.restaurant.index')->with('restaurants', $restaurants);
    }

    public function create(): View
    {
        return view('admin.restaurant.create');
    }

    public function store(RestaurantRequest $request): RedirectResponse
    {
        $request->file('logo')->storeAs('restaurants', $request->name);
        Restaurant::create($request->except('logo'));

        return redirect()->route('admin.restaurant.index');
    }

    public function show(Restaurant $restaurant)
    {

    }

    public function edit(Restaurant $restaurant): View
    {
        return view('admin.restaurant.edit', compact('restaurant'));
    }

    public function update(RestaurantRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->update($request->except('logo'));
        return redirect()->route('admin.restaurant.index');
    }

    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
