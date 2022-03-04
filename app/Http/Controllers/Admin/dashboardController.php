<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(){
       $orders =  Order::count();
       $clients = User::count();
       $reservations = Reservation::count();
       $tables = Table::count();
       $meals = Meal::count();
       $categories = Category::count();
       $available_table= DB::table('tables')->where('status','=',0)->count();
       $reserved_table= DB::table('tables')->where('status','=',1)->count();
        return view('dashboard' ,
         compact('orders','clients','reservations','tables','meals','categories','available_table','reserved_table'));
    }
}
