<?php

use App\Http\Controllers\Admin\OrderController;
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
Route::controller(OrderController::class)->middleware(['auth','admin'])->prefix('order')->group(function (){

    Route::get('/show' ,'showOrders')->name('ShowOrders');
});



