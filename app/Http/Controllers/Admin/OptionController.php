<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MealOptionRequest;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Meal;
use App\Models\Meal_Options;
use App\Models\Option;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class OptionController extends Controller
{
    public function showAllOptions(){
        $options = Option::all();
        return view('Option.show' , compact('options'));
    }

    public function create(){
        return view('Option.create');
    }

    public function storeOption(OptionRequest $request){
       
       Option::create(['name' => $request->name]);
       return redirect(route('ShowOptions'));
    }

    public function editOption($id){
        $option = Option::findOrFail($id);
        return view('Option.edit' , compact('option'));
    }

    public function updateOption(OptionRequest $request ,$id){

        DB::table('options')
        ->where('id', $id)
        ->update(['name' => $request->name ]);
         return redirect(route('ShowOptions'));
    }

    public function deleteOption($id){
        DB::table('options')->where('id', $id)->delete();
        return redirect(route('ShowOptions'));
    }

    public function addOptionsToMeal(){
        $meals = Meal::all();
        $options = Option::all();
        return view('Option.createMealOption' , compact('meals' ,'options'));
    }

    public function storeOptionsToMeal(MealOptionRequest $request){
      Meal_Options::create([
            'meal_id' => $request->meal_id ,
            'option_id' => $request->option_id
        ]);
        return redirect(route('ShowOptions'));
    }


    // try to get options of each meal to show it it meal dataTable
    public function s(){
      $res =   new Reservation();
    //    return Reservation::with('order_meals')->get();
    //  dd($res -> getmeal() )   ;

   return $res -> getmeal();
    //    dd($x );
    // foreach($x as $s){

    //     echo $s;
    //    echo '<br>';
    // }
    //    return $y ; 
    }


    public function join(){
        $res = DB::table('reservations')
        ->join('order_meals', 'reservations.order_id', '=', 'order_meals.order_id')
        ->join('meals', 'order_meals.meal_id', '=', 'meals.id')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->select( 'meals.name' , 'users.name')
        ->get();

        dd($res)  ;
    }
    

}
