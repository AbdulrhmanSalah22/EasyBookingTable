<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('Category.create');
    }
    public function store(CategoryRequest $request ){

        $input = $request->all();
        $cat = Category::create($input);
        $cat->attachMedia($request->file('cat_img'));
        return redirect()->route("ShowCategories");
    }

    public function show(){
        $cats =Category::all(); 
        return view('Category.show',compact('cats'));
    }

    public function delete($id){
        $cat = Category::find($id);
        $cat->delete();
        $cat->detachMedia();
        return redirect()->route('ShowCategories');
    }
    public function edit($id){
        $category =  Category::find($id);
        return view('Category.edit',compact('category'));
    }
    public function update(CategoryRequest $request , $id){
       $cat =  Category::find($id);
       $cat -> name = $request -> name ;
       $cat ->save();
        $cat->updateMedia($request->file('cat_img'));

        return redirect()->route("ShowCategories");

    }

    public function showMeals ($id){

       $cat_meals = Category::with('meal')->find($id);
       return  view('Category.cat_meals',compact('cat_meals'));


    }
}
