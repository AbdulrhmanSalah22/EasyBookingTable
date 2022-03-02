<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Meal;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function getCategories()
    {
        $categories = Category::with(['media'])->get();
        foreach ($categories as $category) {
            $category->media[0]->makeHidden('id','model_type', 'model_id', 'uuid', 'collection_name', 'name', 'file_name', 'mime_type', 'disk', 'conversions_disk', 'size', 'generated_conversions', 'manipulations', 'custom_properties', 'responsive_images', 'order_column', 'created_at', 'updated_at', 'preview_url');
        }
        return response()->json($categories);
    }

    public function getMeals(){
        $meals = Meal::with(['media','category','option'])->get();
             foreach ($meals as $meal){
          $meal-> media[0] -> makeHidden('id','model_type','model_id','uuid','collection_name','name','file_name','mime_type','disk','conversions_disk','size','generated_conversions','manipulations','custom_properties','responsive_images','order_column','created_at','updated_at','preview_url');
             }
        return response()->json($meals);
    }
    
    public function getMeal($id){
       $meal = Meal::with(['media','category','option'])->find($id);

        $meal-> media[0] -> makeHidden('id','model_type','model_id','uuid','collection_name','name','file_name','mime_type','disk','conversions_disk','size','generated_conversions','manipulations','custom_properties','responsive_images','order_column','created_at','updated_at','preview_url');

       return response()->json($meal);
    }


    public function getUserFavorites($user_id)
    {
        $user = User::with('meal')->find($user_id);
        return response()->json($user->meal);
    }

    public function addToFavorite(Request $request){

        ///////// Function to get bearer token form request////////

        /// First Method::
        //// Return the token without the word Bearer

        $t = $request->bearerToken();
        $token_parts = explode('|', $t);

        //// Second Method::
        //// Return all of the token

        // $token = $request->header('Authorization');
        // $auth_header = explode(' ', $token);
        // $token = $auth_header[1];
        // $token_parts = explode('|', $token);

        $favorite = new Favourite();
        $favorite->user_id = $token_parts[0] ;
        $favorite->meal_id = $request->id;
        
        // return response()->json(['status_code' => 200, 'message' =>   $favorite]);
        $favorite->save();
    }

    public function getMealOptions($meal_id)
    {

        $meal = Meal::with('option')->find($meal_id);
        return response()->json($meal);
    }

    public function getUserReservation($user_id)
    {
        $user = User::with([
            'order',
            'table'
        ])->find($user_id);

        // $user = User::with('order')->find($user_id);

        return response()->json($user);
    }

}
