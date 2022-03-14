<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MealController;
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
Route::controller(MealController::class)->middleware(['auth','admin'])->prefix('meal')->group(function (){

    Route::get('/add','create')->name('CreateMeal');
    Route::post('/store','store')->name('StoreMeal');
    Route::get('/show' ,'show')->name('ShowMeals');
    Route::delete('/delete/{id}','delete')->name('DeleteMeal');
    Route::get('/edit/{id}','edit')->name('EditMeal');
    Route::post('/update/{id}','update')->name('UpdateMeal');
    Route::get('/delete/{id}','getOptionOfMeal')->name('delete');
    Route::post('/delete-option/{id}','deleteOptionFromMeal')->name('deleteOptionMeal');

});



