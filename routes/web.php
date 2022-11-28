<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get("/", [HomeController::class, "index"])->name('home');
Route::post("/", [HomeController::class, "index"])->name('home.products.search');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('products', ProductController::class);

// Route about the shop

Route::get('/shop/cart', [ShopController::class, 'cart'])->name('shops.cart');
Route::post('/shop/cart', [ShopController::class, 'store'])->name('shops.cart.store');

require __DIR__.'/auth.php';
