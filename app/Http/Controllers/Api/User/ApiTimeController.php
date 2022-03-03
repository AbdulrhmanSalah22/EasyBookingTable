<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Meals;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use ZipStream\Exception;

class ApiTimeController extends Controller
{
    public function searchForTableStatus(Request $request)
    {
        $date = Carbon::Parse($request-> date);
        $day =  $date->format('d');
        $start_time = Carbon::Parse($request-> start_time);
        $time_in =  $start_time->format('H:i:s');
        $end_time = Carbon::Parse($request-> end_time);
        $time_out =  $end_time->format('H:i:s');

//
//        $table = Table::where('status', '=', '0')->first();
//
//        if ($table) {
//
//            return response()->json(
//                ['status_code' => 200, 'available'=> true ,'table_id' => $table-> id]
//            );
//        }
        $open = [] ;

        $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day','=', $day )->orderBy('table_id')->get();
        $table_id = DB::table('tables')->select('id')->get();
        if (! $reservations_time->contains($table_id)){
            $table_id = $table_id->whereNotIn('id',$reservations_time->table_id);
            return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $table_id]);
        }

                foreach ($reservations_time as $reserve){
           if (!$reserve-> time_in > $time_out || !$reserve-> time_out <  $time_in ) {
                array_push($open,$reserve->table_id);
           }
        }foreach ($reservations_time as $reserve){
        if ($reserve-> time_in > $time_out || $reserve-> time_out <  $time_in){
            if (! in_array($reserve->table_id ,$open)){
            return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $reserve->table_id]);
        }
        }
    }
//
//
//        return response()->json(['status_code' => 200, 'available'=> false ]);
    }
    public function Reservation(Request $request){
        try {
            $token = $request->bearerToken();
            $token_parts = explode('|', $token);
            $user_id = DB::table('personal_access_tokens')
                ->where('id', $token_parts[0])
                ->get();
            $request
//        /  $user_id[0]->tokenable_id *****
            $date =  $request[0]-> date ;
            $total = $request[2]->price ;
            $order =  Order::create([
                'date' => $date,
                'total' => $total
            ]);
            $order_id = $order->id ;
            Reservation::create([
                'user_id' => $user_id[0]->tokenable_id ,
                'order_id' => $order_id ,
                'table_id' => $request[0] -> table_id ,
                'count' => $request[0] -> comment ,
                'day' => $date ,
                'time_in' => $request[0]-> start_time,
                'time_out' => $request[0]-> end_time
            ]);
            foreach ($request[1] as $meal){
                Order_Meals::create([
                    'order_id'=> $order_id ,
                    'meal_id' => $meal->id ,
                    'option_id' => $meal->option[0]->id?? null ,
                ]);
            }
            return redirect(route('sendEmail'));
        }catch (Exception $e){
           $error = $e-> getCode();
           return response()->json(['status_code' => $error]) ;
        }

    }

}
//        $reservations =  DB::table('reservations')
//            ->orderBy('time_out', 'asc')
//            ->get();
//
//        foreach ($reservations  as $value) {
//
//            if ($value->time_in == $request->time_in) {
//
//                $timeOut = $value->time_out ;
//                $timeAfterAddMinutes = Carbon::Parse($timeOut)->addMinutes(30);
//                $newTime =  $timeAfterAddMinutes->format('Y-m-d H:i:s');
//                return response()->json(
//                    ['status_code' => 200, 'answer' => " The new time is $newTime "]
//                );
//            }
//
//        }

        /// Time in not = any time in in database
//        if ($value->time_in != $request->time_in) {
//
//           $y = $request->time_in;
//         $z=  Arr::first($reservations, function ($value, $key) {
//            return $value->time_out > "2022-02-09 15:00:00";
//        });
//        $timeAfterAddMinutes = Carbon::Parse($z->time_out)->addMinutes(30);
//        $newTime =  $timeAfterAddMinutes->format('Y-m-d H:i:s');
//                return response()->json(
//                    ['status_code' => 200, 'answer' => $newTime]
//                );
        // }


//    }'

//}




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






//    }
//}
