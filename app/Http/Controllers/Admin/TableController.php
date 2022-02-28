<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Table\TableRequest;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function showTables(){
       $tables =  Table::all();
        return view('Table.show' , compact('tables'));
    }

    public function create(){
        Table::create();
       return redirect(route('ShowTables'));
    }

    public function editTable($id){
        $table = Table::findOrFail($id);
        return view('Table.edit' , compact('table'));
    }

    public function updateTable($id , TableRequest $request){
        DB::table('tables')
        ->where('id', $id)
        ->update(['status' => $request->status ]);
        return redirect(route('ShowTables'));
    }

    public function deleteTable($id){
        DB::table('tables')->where('id', $id)->delete();
        return redirect(route('ShowTables'));
    }
}
