<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductCategory::class);
    }

    public function index(): View
    {
        $categories = ProductCategory::query()->withCount('products')->simplePaginate(25);

        return view('admin.category.index')->with('categories', $categories);
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(ProductCategoryRequest $request): RedirectResponse
    {
        ProductCategory::create($request->validated());

        return redirect()->route('admin.product-category.index');
    }

    public function show(ProductCategory $productCategory)
    {
    }

    public function edit(ProductCategory $productCategory)
    {

    }

    public function update(ProductCategoryRequest $request, ProductCategory $productCategory): RedirectResponse
    {
        $productCategory->update($request->validated());
        return redirect()->route('admin.product-category.index');
    }

    public function destroy(ProductCategory $productCategory)
    {
    }
}
