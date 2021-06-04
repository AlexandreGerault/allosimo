<?php

use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\ProductCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth'])->name('dashboard');

Route::prefix('admin')
    ->middleware('auth')
    ->as('admin.')
    ->group(
    function () {
        Route::resource('restaurant.category', ProductCategoryController::class);
        Route::resource('restaurant', RestaurantController::class);
    }
);

require __DIR__ . '/auth.php';
