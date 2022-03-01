<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable =['id','user_id','order_id','table_id','comment','time_in','time_out'];

    public function order_meals(){
        return $this -> hasMany(Order_Meals::class , 'order_id' , 'order_id');
    }

    public function user(){
        return $this-> belongsTo(User::class , 'user_id' , 'id');
    }

    // public function getmeal(){
    //     return Order_Meals::with('getmeals');
    // }

//
}

