<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ConfirmOrderController extends Controller
{
    public function __invoke(Request $request): View
    {
        $order = auth()->user()->orders()->latest()->where('state', 'confirmed')->firstOrFail();

        return view('confirm-order', compact('order'));
    }
}
