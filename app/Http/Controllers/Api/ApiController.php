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
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

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

        /// Time in not = any time in in database
        if ($value->time_in != $request->time_in) {

           $y = $request->time_in;
         $z=  Arr::first($reservations, function ($value, $key) {
            return $value->time_out > "2022-02-09 15:00:00";
        });
        $timeAfterAddMinutes = Carbon::Parse($z->time_out)->addMinutes(30);
        $newTime =  $timeAfterAddMinutes->format('Y-m-d H:i:s');
                return response()->json(
                    ['status_code' => 200, 'answer' => $newTime]
                );
            // }
              
           
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
