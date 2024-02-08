<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\KitchenController;

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
Route::get('/', [App\Http\Controllers\OrderController::class, 'index'])->name('order.form');
Route::post('order_submit', [App\Http\Controllers\OrderController::class, 'submit'])->name('order.submit');

Route::resource('dish', DishesController::class);
Route::get('/order', [KitchenController::class, 'order'])->name('kitchen.order');
Route::get('/order', [App\Http\Controllers\KitchenController::class, 'order'])->name('kitchen.order');
Route::get('/order/{order}/approve', [App\Http\Controllers\KitchenController::class, 'approve'])->name('kitchen.order');
Route::get('/order/{order}/cancel', [App\Http\Controllers\KitchenController::class, 'cancel'])->name('kitchen.order');
Route::get('/order/{order}/ready', [App\Http\Controllers\KitchenController::class, 'ready'])->name('kitchen.order');
Route::get('/order/{order}/done', [App\Http\Controllers\KitchenController::class, 'done'])->name('kitchen.order');
Route::get('/order/{order}/serve', [App\Http\Controllers\OrderController::class, 'serve'])->name('kitchen.order');
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,



]);

Route::get('/home', [App\Http\Controllers\OrderController::class, 'index'])->name('home');
