<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Meal;
use App\Models\Order_Meals;
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


    public function addToFavorite(Request $request)
    {

        $token = $request->bearerToken();
        $token_parts = explode('|', $token);
        $user_id = DB::table('personal_access_tokens')
            ->where('id', $token_parts[0])
            ->get();

        $favorite = new Favourite();
        $favorite->user_id = $user_id[0]->tokenable_id;
        $favorite->meal_id = $request->id;
        // return response()->json(['status_code' => 200, 'message' =>   $favorite]);
        $favorite->save();
    }
    public function getUserFavorites(Request $request)
    {
        $fav_meal = [];
        $token = $request->bearerToken();
        $token_parts = explode('|', $token);
        $user_id = DB::table('personal_access_tokens')
            ->where('id', $token_parts[0])
            ->get();
          $user = User::with('meal')->find($user_id[0]->tokenable_id );
          foreach ($user->meal as $meal){
             $a = Meal::with('media')->where('id','=', $meal->id)->get();
             foreach ($a as $aa) {
                 $aa->media[0]->makeHidden('id', 'model_type', 'model_id', 'uuid', 'collection_name', 'name', 'file_name', 'mime_type', 'disk', 'conversions_disk', 'size', 'generated_conversions', 'manipulations', 'custom_properties', 'responsive_images', 'order_column', 'created_at', 'updated_at', 'preview_url');
             }
                 array_push($fav_meal,$a);
          }

        return $fav_meal ;

//        return response()->json(['status_code' => 200, 'message' =>   $user->meal]);
        // return response()->json($user->meal);
    }
        public function getMealOptions($meal_id)
    {

        $meal = Meal::with('option')->find($meal_id);
        return response()->json($meal);
    }

    public function getUserReservation($user_id)
    {
        $a = [] ;
        $user = User::with('order')->find($user_id);
        foreach ($user->order as $order) {
            $order_meals = Order_Meals::with('getMeals')->where('order_id', '=', $order->id)->get();
            array_push($a,$order_meals);
            // $user = User::with('order')->find($user_id);
        }
        return response()->json($a);
    }

}
