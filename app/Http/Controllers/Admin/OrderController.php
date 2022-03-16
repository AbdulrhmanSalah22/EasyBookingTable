<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function showOrders(){
        $orders = Order::all();
        return view('Order.show' , compact('orders'));
    }

    public function deleteOrders(){
        Order::truncate();
        return redirect(route('ShowOrders'));
    }
}
