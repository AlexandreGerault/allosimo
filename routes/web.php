<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OptionCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

Route::get('/', HomeController::class)->name('home');

Route::get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->middleware(['auth'])->name('dashboard');

Route::post("/cart/add/{product}", [CartController::class, 'add'])->name('cart.add');
Route::post("/cart/remove", [CartController::class, 'remove'])->name('cart.remove');
Route::post('/order', [OrderController::class, 'store'])->middleware('auth')->name('order');

Route::prefix('admin')
    ->middleware('auth')
    ->as('admin.')
    ->group(
    function () {
        Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class);
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('restaurant.option-category.option', OptionController::class);
        Route::resource('restaurant.option-category', OptionCategoryController::class);
        Route::resource('restaurant.product', ProductController::class);
        Route::resource('restaurant', RestaurantController::class);
    }
);

Route::resource('restaurant', \App\Http\Controllers\RestaurantController::class)->only('show');

require __DIR__ . '/auth.php';
