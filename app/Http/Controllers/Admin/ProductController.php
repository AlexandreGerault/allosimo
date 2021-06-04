<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
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

    public function store(Restaurant $restaurant, ProductRequest $request)
    {
        $product = Product::make($request->validated());
        $product->category()->associate(ProductCategory::query()->findOrFail($request->get('category')));
        $restaurant->products()->save($product);

        return redirect()->route('admin.restaurant.show', $restaurant);
    }

    public function show(Product $productCategory)
    {
    }

    public function edit(Product $productCategory)
    {
    }

    public function update(Request $request, Product $productCategory)
    {
    }

    public function destroy(Product $productCategory)
    {
    }
}
