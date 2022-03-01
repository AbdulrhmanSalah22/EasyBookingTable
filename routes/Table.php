<?php

use App\Http\Controllers\Admin\TableController;
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
Route::controller(TableController::class)->middleware(['auth','admin'])->prefix('table')->group(function (){

    Route::get('/show' ,'showTables')->name('ShowTables');
    Route::get('/create' ,'create')->name('CreateTable');
    Route::get('/edit/{id}','editTable')->name('EditTable');
    Route::post('/update/{id}','updateTable')->name('UpdateTable');
    Route::delete('/delete/{id}','deleteTable')->name('DeleteTable');
});



