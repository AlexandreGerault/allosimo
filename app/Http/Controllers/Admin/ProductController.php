<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        return view('admin.restaurant.products.create', compact('restaurant'));
    }

    public function store(ProductRequest $request, Restaurant $restaurant): RedirectResponse
    {
        $product = Product::make($request->validated());
        $product->category()->associate(ProductCategory::query()->findOrFail($request->get('category')));
        $restaurant->products()->save($product);

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(Product $productCategory)
    {
    }

    public function edit(Restaurant $restaurant, Product $product): View
    {
        return view('admin.restaurant.products.edit', compact('restaurant', 'product'));
    }

    public function update(ProductRequest $request, Restaurant $restaurant, Product $product)
    {
        $product->category()->associate(ProductCategory::query()->findOrFail($request->get('category')));
        $product->update($request->validated());

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function destroy(Product $productCategory)
    {
    }
}
