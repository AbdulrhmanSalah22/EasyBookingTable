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
        $date = Carbon::Parse($request->date);
        $day =  $date->format('d');
        $month =  $date->format('m');
        $start_time = Carbon::Parse($request->start_time);
        $time_in =  $start_time->format('H:i:s');
        $end_time = Carbon::Parse($request->end_time);
        $time_out =  $end_time->format('H:i:s');

        $table = Table::where('status', '=', '0')->first();

        if ($table) {
            $table->status = true;
            $table->save();
            return response()->json(
                ['status_code' => 200, 'available' => true, 'table_id' => $table]
            );
        }




        $open = [];
        $bussy = [];
        $table_id = DB::table('tables')->count();
        $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day','=', $day )->whereMonth('day','=',$month)->orderBy('table_id')->get();
        $reserved = DB::table('tables')->leftJoin('reservations','tables.id','=','reservations.table_id')->whereDay('day','=', $day )->whereMonth('day','=',$month)->groupBy('id')->select('id')->get();
        foreach ($reserved as $table){
            array_push($bussy ,$table->id );}
        if ($reserved->count() < $table_id){
            $free =  DB::table('tables')->select('id')->whereNotIn('id',$bussy)->get();
            return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $free->random()]);
        }
        // $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day', '=', $day)->whereMonth('day', '=', $month)->orderBy('table_id')->get();
        // if ($reservations_time->isEmpty()) {
        //     $table_id = DB::table('tables')->select('id')->first();
        //     return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $table_id]);
        // }

       

        foreach ($reservations_time as $reserve) {
            if ($reserve->time_in <= $time_out && $reserve->time_out >= $time_in) {
                array_push($open, $reserve->table_id);
            }
        }
        foreach ($reservations_time as $reserve) {
            // the table reserved in time after the request time out asked for 
            //  الشخص الي جاي هيمشي قبل ما الشخص الي حاجز الطربيزة يكون جه

            // or if time_out in reservation < time in from request
            // the table from the reservation will be empty before that time in from request 
            // الراجل هيمشي قبل ما الشخض الجديد يجي
            if ($reserve->time_in > $time_out || $reserve->time_out <  $time_in) {
                if (!in_array($reserve->table_id, $open)) {
                    $id = DB::table('tables')->where('id','=',$reserve->table_id)->select('id')->get();
                    return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $id[0]]);
                }
            }
        }
        // }
        return response()->json(['status_code' => 200, 'available' => false]);
    }
}
// $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day','=', $day )->orderBy('table_id')->get();
// if ( $reservations_time -> isEmpty()){
//     $table_id = DB::table('tables')->select('id')->first();
//      return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $table_id]);
//  }

//*********************************************************************************
 // $table_id = DB::table('tables')->count();
        // $reservations_time = DB::table('reservations')->select('table_id', 'day', 'time_in', 'time_out')->whereDay('day', '=', $day)->orderBy('table_id')->get();
        // if ( $reservations_time ->groupBy('table_id')->count() < $table_id){
        //    $free = DB::table('tables')->select('id')->leftJoinWhere('reservations','id','!=','table_id')->get();
        //      return response()->json(['status_code' => 200, 'available' => true, 'table_id' => $free->random()]);
        //  }