<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionCategoryRequest;
use App\Models\OptionCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class OptionCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(OptionCategory::class);
    }

    public function index()
    {
    }

    public function create(Restaurant $restaurant)
    {
        return view('admin.restaurant.options-category.create', compact('restaurant'));
    }

    public function store(OptionCategoryRequest $request, Restaurant $restaurant)
    {
        $restaurant->optionCategories()->save(OptionCategory::make($request->validated()));

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(OptionCategory $optionCategory)
    {
    }

    public function edit(OptionCategory $optionCategory)
    {
    }

    public function update(OptionCategoryRequest $request, OptionCategory $optionCategory)
    {
    }

    public function destroy(OptionCategory $optionCategory)
    {
    }
}
