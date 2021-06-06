<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Option::class);
    }

    public function index()
    {
    }

    public function create(Restaurant $restaurant, OptionCategory $option_category): View
    {
        return view('admin.restaurant.options-category.options.create', compact('restaurant', 'option_category'));
    }

    public function store(
        OptionRequest $request,
        Restaurant $restaurant,
        OptionCategory $option_category
    ): RedirectResponse {
        $option_category->options()->save(Option::make($request->validated()));

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(Option $option)
    {
    }

    public function edit(Restaurant $restaurant, OptionCategory $option_category, Option $option): View
    {
        return view(
            'admin.restaurant.options-category.options.edit',
            compact('restaurant', 'option_category', 'option')
        );
    }

    public function update(
        OptionRequest $request,
        Restaurant $restaurant,
        OptionCategory $option_category,
        Option $option
    ) {
        $option->update($request->validated());
        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function destroy(Restaurant $restaurant, OptionCategory $option_category, Option $option): RedirectResponse
    {
        $option->delete();

        return redirect()->route('admin.restaurant.show', $restaurant);
    }
}
