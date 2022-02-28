<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends Controller
{
    public function create(){
        return view('Category.create');
    }
    public function store(Request $request ){
//        $category = new Category ;
//        $category-> name = $request-> name ;
//        $category -> save();

        $input = $request->all();
        $cat = Category::create($input);
        if($request->hasFile('cat_img') && $request->file('cat_img')->isValid()){
            $cat->addMediaFromRequest('cat_img')->toMediaCollection('category_img');
        }
        return redirect()->route("ShowCategories");
    }

    public function show(){
        $cats =Category::all(); /// paginate();
        return view('Category.show',compact('cats'));
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect()->route('ShowCategories');
    }
    public function edit($id){
        $category =  Category::find($id);
//        return $category;
        return view('Category.edit',compact('category'));
    }
    public function update(Request $request , $id){
        Category::find($id)->update([
            'name' => $request->name
        ]);
//        Category::find($id)->delete();
//        Media::where('model_id',$id)-> delete();
//        $input = $request->all();
//        $cat = Category::create($input);
//        if($request->hasFile('cat_img') && $request->file('cat_img')->isValid()){
//            $cat->addMediaFromRequest('cat_img')->toMediaCollection('category_img');

        return redirect()->route("ShowCategories");
    }

    public function showMeals ($id){

       $cat_meals = Category::with('meal')->find($id);
       return  view('Category.cat_meals',compact('cat_meals'));


    }
}
