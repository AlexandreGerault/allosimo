<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductCategory::class);
    }

    public function index()
    {
        $categories = ProductCategory::query()->withCount('products')->simplePaginate(25);

        return view('admin.category.index')->with('categories', $categories);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(ProductCategory $productCategory)
    {
    }

    public function edit(ProductCategory $productCategory)
    {
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
    }

    public function destroy(ProductCategory $productCategory)
    {
    }
}
