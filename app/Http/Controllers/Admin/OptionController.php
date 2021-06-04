<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
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

    public function create()
    {
    }

    public function store(Request $request)
    {
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
