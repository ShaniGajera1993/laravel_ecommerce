<?php

use App\Http\Controllers\ProjectController;
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