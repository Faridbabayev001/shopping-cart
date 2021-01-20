<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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


Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('login',[AuthController::class,'show_login_form'])->name('login_form');

Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('register',[AuthController::class,'show_register_form'])->name('register_form');
Route::post('register',[AuthController::class,'register'])->name('register');

Route::view('/basket','basket')->name('basket');
Route::view('/checkout','checkout')->name('checkout');
