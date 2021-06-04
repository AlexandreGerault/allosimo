<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionCategoryRequest;
use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OptionCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(OptionCategory::class);
    }

    public function index()
    {
    }

    public function create(Restaurant $restaurant): View
    {
        return view('admin.restaurant.options-category.create', compact('restaurant'));
    }

    public function store(OptionCategoryRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $restaurant->optionCategories()->save(OptionCategory::make($request->validated()));

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(OptionCategory $optionCategory)
    {
    }

    public function edit(Restaurant $restaurant, OptionCategory $optionCategory): View
    {
        return view('admin.restaurant.options-category.edit', compact('restaurant', 'optionCategory'));
    }

    public function update(OptionCategoryRequest $request, Restaurant $restaurant, OptionCategory $optionCategory)
    {
    }

    public function destroy(OptionCategory $optionCategory)
    {
    }
}
