<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Meal\DeleteMealOptionRequest;
use App\Http\Requests\Admin\Meal\MealRequest;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Support\Facades\DB;

class MealController extends Controller
{
    public function create(){
        $cats = Category::all();
       return view('Meal.create',compact('cats'));
    }
    public function store(MealRequest $request){

        $input = $request->all();
        $meal = Meal::create($input);
        $meal->attachMedia($request->file('meal_img'));
    return redirect()->route('ShowMeals');
    }

    public function show(){
       $meals = Meal::with([
        'category',
        'option'
       ])->get();
       return view('Meal.show',compact('meals'));
    }

    public function delete($id){
        $meal = Meal::find($id);
        $meal->delete();
        $meal->detachMedia();
        return redirect()->route('ShowMeals');
    }
    public function edit($id){
        $meal =  Meal::find($id);
        $meal -> category();
        $cats = Category::all();
        return view('Meal.edit',compact('meal','cats'));
    }
    public function update(MealRequest $request , $id)
    {
        $meal = Meal::find($id);
        $meal->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        $meal->updateMedia($request->file('meal_img'));
            return redirect()->route("ShowMeals");
        }

        public function getOptionOfMeal($id){
            $meal = Meal::find($id);
//            $option = Meal::with('option')->get();
            $option = $meal->option;
            return view('Meal.deleteOption',compact('meal','option'));
        }

        public function deleteOptionFromMeal(DeleteMealOptionRequest $request , $id){
           DB::table('meal_options')->where('meal_id','=',$id)
          ->where('option_id','=',$request->option_id)
          ->delete();
          return redirect()->route("ShowMeals");
        }

}
