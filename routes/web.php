<?php

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


Route::resource('items', '\App\Http\Controllers\ItemController')->middleware(['auth']);
Route::resource('categories', '\App\Http\Controllers\CategoryController')->middleware(['auth']);
Route::resource('products', '\App\Http\Controllers\ProductController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products/{category_id}/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('products.search');

Route::get('/shopping',  [\App\Http\Controllers\ShoppingController::class, 'index'])->name('shopping.index');
Route::post('/shopping',  [\App\Http\Controllers\ShoppingController::class, 'store'])->name('shopping.store');
Route::put('/shopping/{item_id}',  [\App\Http\Controllers\ShoppingController::class, 'update_cart'])->name('shopping.update_cart');
Route::delete('/shopping/{item_id}',  [\App\Http\Controllers\ShoppingController::class, 'remove_item'])->name('shopping.remove_item');

Route::get('/orders',  [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index')->middleware(['auth']);
Route::post('/orders',  [\App\Http\Controllers\OrderController::class, 'check_order'])->name('orders.check_order');

Route::get('/itemsSold/{order_id}', [\App\Http\Controllers\ItemSoldController::class, 'items_sold'])->name('itemsSold.items_sold');
Route::get('/itemsSold/{order_id}/receipt', [\App\Http\Controllers\ItemSoldController::class, 'receipt'])->name('itemsSold.receipt');