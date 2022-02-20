<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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

}
