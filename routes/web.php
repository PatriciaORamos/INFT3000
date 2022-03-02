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


Route::resource('items', '\App\Http\Controllers\ItemController');
Route::resource('categories', '\App\Http\Controllers\CategoryController');
Route::resource('products', '\App\Http\Controllers\ProductController');
Route::resource('shopping', '\App\Http\Controllers\ShoppingController');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products/{category_id}/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
Route::post('/shopping',  [\App\Http\Controllers\ShoppingController::class, 'store'])->name('shopping.store');