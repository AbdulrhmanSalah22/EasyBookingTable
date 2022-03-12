<?php

use App\Http\Controllers\Admin\ReservationController;
use App\Models\Reservation;
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
Route::controller(ReservationController::class)->middleware(['auth','admin'])->prefix('reservation')->group(function (){

    Route::get('/show' ,'showReservations')->name('ShowReservations');
    Route::get('/show-order/{id}' ,'showOrderDetails')->name('ShowOrderDetails');
    Route::delete('/delete-reservation' ,'deleteReservations')->name('DeleteReservations');
});



