<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['id','date','total'];
    protected $hidden = ['created_at','updated_at', 'pivot'];

    public function meal(){
        return $this->hasMany(Meal_Options::class , 'order_id','id');
    }

}


