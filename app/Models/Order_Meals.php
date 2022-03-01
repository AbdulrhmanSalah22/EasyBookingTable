<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Meals extends Model
{
    use HasFactory;

    protected $table = 'order_meals' ;
    protected $fillable =['id','order_id','meal_id','order_id'];


    public function getMeals(){
        return $this->hasMany(Meal::class , 'id','id');
    }
}
