<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use  App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use  App\Http\Controllers\ProductController;


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


Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('/',[HomeController::class,'index'])->name('home'); 
Route::get('shop', [ShopController::class, 'index'])->name('shop');
Route::get('search', [ShopController::class, 'search'])->name('search');
Route::get('/product/{id}/details', [ShopController::class, 'getProductDetails'])->name('product-details');
Route::post('/product/{id}cart/add', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/product/{id}/decrease', [CartController::class, 'decrease'])->name('decrease');
Route::get('/product/{id}/increase', [CartController::class, 'increase'])->name('increase');
Route::get('/product/{id}/delete', [CartController::class, 'delete'])->name('delete');
Route::post('checkout', [CartController::class, 'checkout'])->name('checkout');

Route::middleware('auth')->group(function () {
    Route::resource('products',ProductController::class);
    Route::get('/products/images/{id}/delete', [ProductController::class, 'deleteProductImage'])->name('deleteProductImage');
    Route::resource('orders',OrderController::class)->only('index','destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
