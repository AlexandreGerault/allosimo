<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Option;
use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function store(OptionRequest $request, Restaurant $restaurant, OptionCategory $option_category): RedirectResponse
    {
        $option_category->options()->save(Option::make($request->validated()));
        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(Option $option)
    {
    }

    public function edit(Option $option)
    {
    }

    public function update(Request $request, Option $option)
    {
    }

    public function destroy(Option $option)
    {
    }
}
