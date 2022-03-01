<?php

use App\Http\Controllers\Admin\CategoryController;
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
Route::controller(CategoryController::class)->prefix('cat')->middleware(['auth','admin'])->group(function (){

    Route::get('/add','create')->name('CreateCategory');
    Route::post('/store','store')->name('StoreCategory');
    Route::get('/show' ,'show')->name('ShowCategories');
    Route::delete('/delete/{id}','delete')->name('DeleteCategory');
    Route::get('/edit/{id}','edit')->name('EditCategory');
    Route::post('/update/{id}','update')->name('UpdateCategory');
    Route::get('/cat-meals/{id}','showMeals')->name('Cat_Meals');
});





