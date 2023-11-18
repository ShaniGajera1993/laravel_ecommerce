<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProjectController::class,'index']);

Route::get('/products', [ProjectController::class,'product']);

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/terms', function () {
    return view('terms');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/product-details/{id}', [ProjectController::class,'productdetails'])->name('product.details');

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/cart', [CartController::class, 'cart']);

Route::get('/newest', [ProjectController::class,'newest']);

Route::get('/lowest_price', [ProjectController::class,'lowest']);

Route::get('/highest_price', [ProjectController::class,'highest']);

Route::get('/men', [ProjectController::class,'men']);

Route::get('/women', [ProjectController::class,'women']);

Route::post('/add_to_cart', [CartController::class,'add_to_cart'])->name('add_to_cart');

Route::get('/add_to_cart', function(){
    return redirect('/');
});

Route::post('/remove_from_cart', [CartController::class,'remove_from_cart'])->name('remove_from_cart');

Route::get('/remove_from_cart', function(){
    return redirect('/');
});

Route::post('/edit_product_quantity', [CartController::class,'edit_product_quantity'])->name('edit_product_quantity');

Route::get('/edit_product_quantity', function(){
    return redirect('/');
});