<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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


    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('login', [AuthController::class, 'show_login_form'])->name('login_form');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('register', [AuthController::class, 'show_register_form'])->name('register_form');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::view('basket', 'basket')->name('basket');
    Route::get('addToBasket/{productId}', [BasketController::class, 'addToBasket'])->name('addToBasket');
    Route::get('getCart',[BasketController::class,'getCartContent'])->name('getCart');
    Route::get('basket/updateCount/{productId}/{productCount}',[BasketController::class,'updateProductCount'])->name('updateCount');
    Route::get('basket/removeCart/{productId}',[BasketController::class,'removeProduct'])->name('removeProduct');

    Route::get('checkout',[OrderController::class,'checkout'])->name('checkout');
    Route::post('sendOrder',[OrderController::class,'sendOrder'])->name('sendOrder');
