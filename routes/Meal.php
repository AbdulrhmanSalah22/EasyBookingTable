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
Route::controller(MealController::class)->prefix('meal')->group(function (){

    Route::get('/add','create');
    Route::post('/store','store')->name('StoreMeal');
    Route::get('/show' ,'show')->name('ShowMeals');
});





