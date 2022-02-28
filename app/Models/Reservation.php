<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function user(){
        return $this-> belongsTo(User::class , 'user_id' , 'id');
    }
    public function order_meals(){
        return $this -> hasMany(Order_Meals::class , 'order_id' , 'order_id');
    }

}

