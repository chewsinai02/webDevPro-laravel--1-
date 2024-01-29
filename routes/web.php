<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('homePage');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/addFood', function () {
    return view('addFood');
});

Route::get('/testing', function () {
    return view('testing');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addFood/store',[App\Http\Controllers\FoodController::class,'add'])->name('addFood');
Route::get('/shopNow',[App\Http\Controllers\FoodController::class,'view'])->name('shopNow');
Route::get('/drinks',[App\Http\Controllers\FoodController::class,'drinks']);
Route::get('/snacks',[App\Http\Controllers\FoodController::class,'snacks']);
Route::get('/chocolate',[App\Http\Controllers\FoodController::class,'chocolate']);
Route::get('/instant-noodle',[App\Http\Controllers\FoodController::class,'noodle']);
Route::post('/addCart',[App\Http\Controllers\CartController::class,'add'])->name('addCart');
Route::get('/myCart',[App\Http\Controllers\CartController::class,'view'])->name('myCart');
Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');
Route::get('/plans', [App\Http\Controllers\PlanController::class, 'plans'])->name('plans');
Route::get('/subscriptions', [App\Http\Controllers\SubscriptionController::class, 'subscriptions'])->name('subscriptions');
Route::post('/subscriptions', [App\Http\Controllers\SubscriptionController::class, 'store']);
Route::get('/subscribed', [App\Http\Controllers\SubscriptionController::class, 'showSubscribed'])->name('subscribed');
Route::get('/pdf', [App\Http\Controllers\SubscriptionController::class, 'pdf'])->name('pdf');
Route::post('/search', [App\Http\Controllers\FoodController::class, 'search'])->name('search');