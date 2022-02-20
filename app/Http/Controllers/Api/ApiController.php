<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories(){
//        $categories = Category::with('meal')->get();
        $categories = Category::all();
        return response()->json($categories);
    }
    public function getMeals(){
//         $meals = Meal::with('category')->get();
        $meals = Meal::all();

//        $meals = Meal::first()->getMedia();
//        dd($meals) ;
        return response()->json($meals);
    }

    public function getUserFavorites($user_id){

        $user = User::with('meal')->find($user_id);
        return response()->json($user);

    }

    public function getMealOptions($meal_id){

        $meal = Meal::with('option')->find($meal_id);
        return response()->json($meal);

    }

    public function getUserReservation($user_id){
        $user = User::with([
            'order',
            'table'
        ])->find($user_id);

        // $user = User::with('order')->find($user_id);

        return response()->json($user);

    }
}
