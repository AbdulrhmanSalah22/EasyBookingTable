<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_Meals;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function showReservations(){
        $reservations = Reservation::all();
       return view('Reservation.show' , compact('reservations'));
    }

    public function showOrderDetails($id){

      $meals=  Order_Meals::with('getMeals')->where('order_id' , $id)->get();
        return view('Reservation.orderData' , compact('meals'));
    }
}
