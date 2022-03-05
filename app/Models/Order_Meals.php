<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Meals extends Model
{

    use HasFactory;

    protected $table = 'order_meals' ;
    protected $fillable =['id','order_id','meal_id','option_id','num'];


    public function getMeals(){
        return $this->hasMany(Meal::class , 'id','meal_id');
    }
    public function getOption(){
        return $this->hasMany(Option::class , 'id','option_id');
    }

    public function order(){
        return $this->hasMany(Order::class , 'order_id' , 'id');
    }
}
