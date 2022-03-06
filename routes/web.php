<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    $products = ProductsController::list(9);
    return view('index',compact('products'));
});

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth/verify');
})->middleware('auth')->name('verification.notice');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::group(['middleware' => ['verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');

    Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');

    Route::get('/show/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('show');

    Route::get('/add-to-cart/{id}', [App\Http\Controllers\ProductsController::class, 'addToCart'])->name('addToCart');

    Route::delete('/remove-from-cart/{id}', [App\Http\Controllers\ProductsController::class, 'removeFromCart'])->name('removeFromCart');

    Route::get('/clear-cart', [App\Http\Controllers\ProductsController::class, 'clearCart'])->name('clearCart');

    Route::get('/reduce-to-cart/{id}', [App\Http\Controllers\ProductsController::class, 'reduceToCart'])->name('reduceToCart');

    Route::post('/payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('selectPayment');

    Route::get('payment-methods/create', [App\Http\Controllers\PaymentMethodsController::class, 'create'])->name('paymentMethods.create');

    Route::post('payment-methods/store', [App\Http\Controllers\PaymentMethodsController::class, 'store'])->name('paymentMethods.store');

    Route::get('/order/sucess', function ($order) {
        return view('order/sucess', compact('order'));
    })->name('order.sucess');
});