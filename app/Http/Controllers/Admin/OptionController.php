<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function showAllOptions(){
        $options = Option::all();
        return view('Option.show' , compact('options'));
    }

    public function createOption(OptionRequest $request){
       
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
}
