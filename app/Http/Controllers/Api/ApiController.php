<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
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
}
