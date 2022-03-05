<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\Email;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Order_Meals;
use App\Models\Reservation;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;

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


    public function getUserFavorites(Request $request)
    {
        $token = $request->bearerToken();
        $token_parts = explode('|', $token);
        $user_id = DB::table('personal_access_tokens')
        ->where('id', $token_parts[0])
        ->get();
        $fav_meal = [];
        $user = User::with('meal')->find($user_id[0]->tokenable_id );
        foreach ($user->meal as $meal){
            $MealWithMedia = Meal::with('media')->where('id','=', $meal->id)->get();
            foreach ($MealWithMedia as $mealMedia) {
                $mealMedia->media[0]->makeHidden('id', 'model_type', 'model_id', 'uuid', 'collection_name', 'name', 'file_name', 'mime_type', 'disk', 'conversions_disk', 'size', 'generated_conversions', 'manipulations', 'custom_properties', 'responsive_images', 'order_column', 'created_at', 'updated_at', 'preview_url');
            }
            array_push($fav_meal,$MealWithMedia);
        }
        return response()->json($fav_meal);

    }

    public function addToFavorite(Request $request){

        $token = $request->bearerToken();
        $token_parts = explode('|', $token);
        $user_id = DB::table('personal_access_tokens')
        ->where('id', $token_parts[0])
        ->get();
        $exist = DB::table('favourites')->where('user_id','=',$user_id[0]->tokenable_id)->where('meal_id','=',$request->id)->get();
       if ($exist->count() >= 1){
           return response()->json(['status_code' => 400 , 'error_message'=> 'Item Already Exist']);
       }
        $favorite = new Favourite();
        $favorite->user_id = $user_id[0]->tokenable_id ;
        $favorite->meal_id = $request->id;
        $favorite->save();

        return response()->json(['status_code' => 200 , 'message' => 'Added' ]);

    }

    public function deleteFromFavorite(Request $request , $id){
        $token = $request->bearerToken();
        $token_parts = explode('|', $token);
        $user_id = DB::table('personal_access_tokens')
        ->where('id', $token_parts[0])
        ->get();

        DB::table('favourites')->where('user_id', $user_id[0]->tokenable_id)
        ->where('meal_id' , $id)
        ->delete();
         return response()->json(['status_code' => 200]);
    }

    public function getMealOptions($meal_id)
    {

        $meal = Meal::with('option')->find($meal_id);
        return response()->json($meal);
    }

    public function getUserReservation(Request $request)
    {
        $token = $request->bearerToken();
        $token_parts = explode('|', $token);
        $user_id = DB::table('personal_access_tokens')
        ->where('id', $token_parts[0])
        ->get();

        $array = [] ;
        $user = User::with('order')->find($user_id[0]->tokenable_id);
        array_push($array, $user);
        foreach ($user->order as $order) {
            $order_meals = Order_Meals::with('getMeals')->where('order_id', '=', $order->id)->get();
            array_push($array,$order_meals);
        }
        return response()->json($array);
    }

    // public function sendEmail(Request $request){
    //     $token = $request->bearerToken();
    //     $token_parts = explode('|', $token);
    //     $user_id = DB::table('personal_access_tokens')
    //     ->where('id', $token_parts[0])
    //     ->get();

    //    $user =  DB::table('users')
    //     ->where('id', $user_id[0]->tokenable_id)
    //     ->get();

    //     $details =  [
    //         'title' => 'Reservation',
    //         'body' => "Thanks for reserving in our restaurant the reservation
    //          will be at day, time_in , time_out"
    //     ];

    //     Mail::to($user[0]->email)->send(new Email($details));

    //     return response()->json(['status_code' => 200 , 'email' => 'email sent successfully' ]);
    // }


    public function insertIntoReservation(Request $request){
        // return $request ;
        // foreach ($request[1] as $meal){return $meal['count'];}
        try {

            $time_in = $request[0]['start_time'];
            $time_out = $request[0]['end_time'];
            $token = $request->bearerToken();
            $token_parts = explode('|', $token);
            $user_id = DB::table('personal_access_tokens')
                ->where('id', $token_parts[0])
                ->get();

            $count = explode(' ', $request[0]['comment']);
            $date =  $request[0]['date'];
            $total = $request[2]['price'] ;
            $order =  Order::create([
                'date' => $date,
                'total' => $total
            ]);
            $order_id = $order->id ;
            Reservation::create([
                'user_id' => $user_id[0]->tokenable_id ,
                'order_id' => $order_id ,
                'table_id' => $request[0]['table_id']['id'] ,
                'count' =>  $count[0] ,
                'day' => $date ,
                'time_in' => $request[0]['start_time']   ,
                'time_out' => $request[0]['end_time']
            ]);
            foreach ($request[1] as $meal){
                Order_Meals::create([
                    'order_id'=> $order_id ,
                    'meal_id' => $meal['id'] ,
                    'option_id' => isset($meal['selectedOption']) ? $meal['selectedOption'] : null,
                    'num' => $meal['count']  ,
                ]);
            }
            

            ////// Send Email
            $user =  DB::table('users')
            ->where('id', $user_id[0]->tokenable_id)
            ->get();
    
            $details =  [
                'title' => 'Hello ' . $user[0]->name,
                'body' => "Thanks for reserving in our restaurant.
                 the reservation will be at $date From $time_in to $time_out , 
                 we will be waiting for you.
                 Have a nice day."
            ];
    
            Mail::to($user[0]->email)->send(new Email($details));
    
            // return response()->json(['status_code' => 200 , 'email' => 'Email sent successfully' ]);


            ///////////////////////
        }catch (Exception $e){
           $error = $e-> getCode();
           return response()->json(['status_code' => $error]) ;
        }
    }


    public function payment(Request $request){

            Stripe\Stripe::setApikey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
             "amount"=> $request->price * 100,
             "currency"=>"usd",
             "source"=> $request->token,
             "description"=> "Try"
            ]);
            
        return response()->json(['status_code' => 200 , 'request' => $request->token]);
    }

}
