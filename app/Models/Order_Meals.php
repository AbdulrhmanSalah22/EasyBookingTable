<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Meals extends Model
{

    use HasFactory;

    public function getmeals(){
        return $this->hasMany(Meal::class , 'meal_id','id');
    }
    public function allmeal(){
        return $this->hasMany(Meal::class,'meal_id','id');
    }

}
