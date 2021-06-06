<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }

    public function index()
    {
    }

    public function create(Restaurant $restaurant): View
    {
        $restaurant->load('optionCategories.options');
        $optionsCategories = $restaurant->optionCategories;

        return view('admin.restaurant.products.create', compact('restaurant', 'optionsCategories'));
    }

    public function store(ProductRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $product = Product::make($request->validated());
        $product->category()->associate(ProductCategory::query()->findOrFail($request->get('category')));
        $restaurant->products()->save($product);
        $product->options()->sync($request->get('options'));

        if ($request->hasFile('image')) {
            $product->image = $product->name . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('restaurant/' . $restaurant->name . '/products', $product->image);
        }

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(Product $productCategory)
    {
    }

    public function edit(Restaurant $restaurant, Product $product): View
    {
        $restaurant->load('optionCategories.options');
        $optionsCategories = $restaurant->optionCategories;

        return view('admin.restaurant.products.edit', compact('restaurant', 'product', 'optionsCategories'));
    }

    public function update(ProductRequest $request, Restaurant $restaurant, Product $product): RedirectResponse
    {
        $product->category()->associate(ProductCategory::query()->findOrFail($request->get('category')));
        $product->update($request->validated());
        $product->options()->sync($request->get('options'));
        if ($request->hasFile('image')) {
            $oldPath = 'restaurant/' . $restaurant->name . '/products/' . $product->image;
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            $product->image = $product->name . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('restaurant/' . $restaurant->name . '/products', $product->image);
        }
        $product->save();

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function destroy(Product $productCategory)
    {
    }
}
