<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class ApiController extends Controller
{
    public function getCategories()
    {
        //        $categories = Category::with('meal')->get();
        $categories = Category::all();
        return response()->json($categories);
    }
    public function getMeals(){
//         $meals = Meal::with('category')->get();
        $meals = Meal::with(['media','category'])->get();
//        $meals = Meal::with(['media'=>function($q){
             foreach ($meals as $meal)
          $meal-> media[0] -> makeHidden('model_type','model_id','uuid','collection_name','name','file_name','mime_type','disk','conversions_disk','size','generated_conversions','manipulations','custom_properties','responsive_images','order_column','created_at','updated_at','preview_url');
//              -> original_url;
//        }])->get();
//        $a  = array();
//        $meals = Meal::all();
//
//        foreach ($meals as $meal){
//          $x =  $meal -> getFirstMediaUrl('meal_img');
//        } return $x ;
//        foreach ( $meals as $meal){
//            foreach ($meal->media as $media){
//                $a = $a->push($media ->getFullUrl() );
//            }}
//        return $a ;
//       return $meals[0] -> media[0]-> getFullUrl();
//        foreach ($meals->media as $media)
//           $a = $a->push( $media -> original_url);
//       foreach ( $meals as $meal) {
//           $all = $meal->select('id', 'name', 'price', 'description', 'category_id')->get();
//           foreach ($meal->media as $media){
//               $all->push($media ->getFullUrl()) ;
//       }
//       }
//       return $a;


//        return $all ;
//         $img = $meals-> original_url;
//        return strtolower(str_replace(['\\'], '','http:\/\/localhost:8000\/storage\/13\/drinks.jpeg'));
//        return $meals[0] -> media[0] -> original_url;
        return $meals;
    }


    public function getUserFavorites($user_id)
    {

        $user = User::with('meal')->find($user_id);
        return response()->json($user);
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


    public function searchForTableStatus(Request $request)
    {
        $table = Table::where('status', '=', '0')->first();

        if ($table) {

            return response()->json(
                ['status_code' => 200, 'table availability' => $table]
            );
        }

        $reservations =  DB::table('reservations')
            ->orderBy('time_out', 'asc')
            ->get();
        //    ->get( ['time_in' , 'time_out' , 'table_id']);

        // return response()->json(
        //     ['status_code' => 200, 'answer' => $reservations]
        // );

        foreach ($reservations  as $value) {

            if ($value->time_in == $request->time_in) {

                $timeOut = $value->time_out ;
                $timeAfterAddMinutes = Carbon::Parse($timeOut)->addMinutes(30);
                $newTime =  $timeAfterAddMinutes->format('Y-m-d H:i:s');
                return response()->json(
                    ['status_code' => 200, 'answer' => " The new time is $newTime "]
                );
            }
        }
        //        // else{
        //        //     return response()->json(
        //        //         ['status_code' => 200, 'answer' => 'hi']
        //        //         // ['status_code' => 200, 'table availability' => $table]
        //        //     );
        //        // }
        //    }


        // return response()->json(
        //     ['status_code' => 200, 'answer' => $request->time_in]
        //     // ['status_code' => 200, 'table availability' => $table]
        // );






    }
}
