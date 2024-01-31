<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PaymentEmail;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SmtpController;
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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/myorder', [ProjectController::class, 'getOrderHistory']);
 
Route::post('/sendmail', [SmtpController::class,'sendMail'])->name('sendmail');
Route::get('/sendmail', function(){
    return redirect('/');
});

Route::get('/product-details/{id}', [ProjectController::class,'productdetails'])->name('product.details');

Route::get('/login', [AuthController::class, 'login']);

Route::post('/auth_login', [AuthController::class, 'authLogin'])->name('auth_login');

Route::get('/auth_login', function(){
    return redirect('/');
});

Route::post('/auth-logout', [AuthController::class, 'authLogout'])->name('auth_logout');

Route::get('/auth_logout', function(){
    return redirect('/');
});

Route::get('/register', [AuthController::class, 'register']);

Route::post('/auth-register', [AuthController::class, 'authRegister'])->name('auth_register');

Route::get('/auth-register', function(){
    return redirect('/');
});

Route::get('/cart', [CartController::class, 'cart']);

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::get('/payment', [OrderController::class, 'payment'])->name('payment');

Route::post('/place_order', [OrderController::class, 'placeOrder'])->name('place_order');

Route::get('/place_order', function(){
    return redirect('/');
});

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

Route::get('/verify_payment/{transaction_id}', [OrderController::class, 'verifyPayment'])->name('verify_payment');

Route::get('/complete_payment', [OrderController::class, 'completePayment'])->name('complete_payment');

Route::get('/thank-you', [OrderController::class, 'thankYou'])->name('thank_you');