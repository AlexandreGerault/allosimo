<?php

use App\Http\Controllers\Admin\DeliveryGuyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OrderDeliveryGuyController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OptionCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TacosAndPizzasOnlyController;
use App\Http\Controllers\TacosCharbonController;
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



Route::middleware('auth')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::post("/cart/add/{product}", [CartController::class, 'add'])->name('cart.add');
    Route::post("/cart/remove", [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/order', [OrderController::class, 'store'])->middleware('auth')->name('order');
});

Route::prefix('tacos-and-pizza-only')->as('tacos-pizza-only.')->group(function () {
    Route::get('/', [TacosAndPizzasOnlyController::class, 'home'])->name('home');
    Route::get('/tacos', [TacosAndPizzasOnlyController::class, 'tacos'])->name('tacos');
    Route::get('/pizza', [TacosAndPizzasOnlyController::class, 'pizza'])->name('pizza');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest:tacos-pizza-only');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register')->middleware('guest:tacos-pizza-only');
});

Route::prefix('/tacos-charbon')->as('tacos-charbon.')->group(function () {
    Route::get('/', TacosCharbonController::class)->name('home');
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login')->middleware('guest:tacos-charbon');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register')->middleware('guest:tacos-charbon');
});


Route::prefix('admin')
    ->middleware('auth')
    ->as('admin.')
    ->group(
    function () {
        Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');
        Route::resource('delivery-guys', DeliveryGuyController::class);
        Route::resource('orders.delivery-guys', OrderDeliveryGuyController::class)->only('store');
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
