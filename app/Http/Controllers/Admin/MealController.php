<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Meal\MealRequest;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function create(){
        $cats = Category::all();
       return view('Meal.create',compact('cats'));
    }
    public function store(MealRequest $request){

        $input = $request->all();

        $meal = Meal::create($input);
        if($request->hasFile('meal_img') && $request->file('meal_img')->isValid()){
            $meal->addMediaFromRequest('meal_img')->toMediaCollection('meal_img');
        }

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
        Meal::find($id)->delete();
        return redirect()->route('ShowMeals');
    }
    public function edit($id){
        $meal =  Meal::find($id);
        $meal -> category();
        $cats = Category::all();
        return view('Meal.edit',compact('meal','cats'));
    }
    public function update(Request $request , $id)
    {
        $meal = Meal::find($id);
        $meal->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        if ($request->hasFile('meal_img')) {
            $meal->clearMediaCollection('meal_img');
            $meal->addMediaFromRequest('meal_img')->toMediaCollection('meal_img');

            return redirect()->route("ShowMeals");
        }
    }
}
