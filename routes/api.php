<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\User\ApiUserController;
use App\Http\Controllers\Api\User\ApiTimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/////////// Add middleware ////////

Route::controller(ApiController::class)->group(function (){
    Route::get('get-cat','getCategories');
    Route::get('get-meal','getMeals');
    Route::get('get-meal/{id}','getMeal');
    Route::get('get-fav/{user_id}','getUserFavorites');
    Route::post('add-fav','addToFavorite');
    Route::get('get-option/{meal_id}','getMealOptions');
    Route::get('get-reservation/{user_id}','getUserReservation');

});

Route::controller(ApiUserController::class)->group(function (){
    Route::post('user/register','register');
    Route::post('user/login','login');
    Route::post('user/logout','logout')->middleware('auth:sanctum');

});

Route::controller(ApiTimeController::class)->group(function (){

    Route::get('get-table','searchForTableStatus');

});


