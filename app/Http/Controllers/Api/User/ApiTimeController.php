<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApiTimeController extends Controller
{
    public function searchForTableStatus(Request $request)
    {
        $date = Carbon::Parse($request-> date);
        $day =  $date->format('d');
        $month =  $date->format('M');
        $start_time = Carbon::Parse($request-> start_time);
        $time_in =  $start_time->format('H:i:s');
        $end_time = Carbon::Parse($request-> end_time);
        $time_out =  $end_time->format('H:i:s');

        $table = Table::where('status', '=', '0')->first();

        if ($table) {
            $table -> status = 1 ;
            return response()->json(
                ['status_code' => 200, 'available' => true,'table_id' => $table->id]
            );
        }

        
    

        $open = [] ;
        $table_id = DB::table('tables')->count();
        $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day','=', $day )->whereMonth('day','=',$month)->orderBy('table_id')->get();
        if ( $reservations_time ->groupBy('table_id')->count() < $table_id){
           $free = DB::table('tables')->select('id')->leftJoinWhere('reservations','id','!=','table_id')->get();
             return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $free->random()]);
         }
         
        foreach ($reservations_time as $reserve){
            if ( $reserve-> time_in <= $time_out && $reserve-> time_out >= $time_in ) {
               array_push($open,$reserve->table_id);
            }
        } 
        foreach ($reservations_time as $reserve){
            // the table reserved in time after the request time out asked for 
            //  الشخص الي جاي هيمشي قبل ما الشخص الي حاجز الطربيزة يكون جه
            
            // or if time_out in reservation < time in from request
            // the table from the reservation will be empty before that time in from request 
            // الراجل هيمشي قبل ما الشخض الجديد يجي
            if ($reserve-> time_in > $time_out || $reserve-> time_out <  $time_in){
                if (! in_array($reserve->table_id ,$open)){
                    return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $reserve->table_id]);
                }
        }
    }
    // }
        return response()->json(['status_code' => 200, 'available'=> false ]);
    }
    
}
// $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day','=', $day )->orderBy('table_id')->get();
// if ( $reservations_time -> isEmpty()){
//     $table_id = DB::table('tables')->select('id')->first();
//      return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $table_id]);
//  }
