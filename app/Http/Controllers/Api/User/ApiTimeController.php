<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ApiTimeController extends Controller
{
    public function searchForTableStatus(Request $request)
    {
        $table = Table::where('status', '=', '0')->first();

        if ($table) {

            return response()->json(
                ['status_code' => 200, 'table Id' => $table->id]
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
