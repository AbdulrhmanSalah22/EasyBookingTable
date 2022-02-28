<?php

use App\Http\Controllers\Admin\OptionController;
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
Route::controller(OptionController::class)->prefix('option')->group(function (){

    Route::get('/show' ,'showAllOptions')->name('ShowOptions');
    Route::get('/create' ,'create')->name('CreateOptions');
    Route::post('/store' ,'storeOption')->name('StoreOptions');
    Route::get('/edit/{id}','editOption')->name('EditOption');
    Route::post('/update/{id}','updateOption')->name('UpdateOption');
    Route::delete('/delete/{id}','deleteOption')->name('DeleteOption');
    Route::get('/add-to-meal' ,'addOptionsToMeal')->name('AddMealOptions');
    Route::post('/store-to-meal' ,'storeOptionsToMeal')->name('StoreMealOptions');

    Route::get('/try' ,'s')->name('a');
    Route::get('/join' ,'join')->name('join');
});





