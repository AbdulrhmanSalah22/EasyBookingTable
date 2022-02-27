<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\User\ApiUserController;
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
    Route::get('get-fav/{user_id}','getUserFavorites');
    Route::get('get-option/{meal_id}','getMealOptions');
    Route::get('get-reservation/{user_id}','getUserReservation');
    Route::post('get-table','searchForTableStatus');

});

Route::controller(ApiUserController::class)->group(function (){
    Route::post('user/register','register');
    Route::post('user/login','login');
    Route::post('user/logout','logout')->middleware('auth:sanctum');

});












Route::get('/show',function (){
    $ImageUrl = DB::table('media')->select('file_name' , 'model_id')
        ->where('model_type','=','App\Models\Category')->get();
//        return $ImageUrl ;
    return response()->json($ImageUrl);
});

