<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal_Options extends Model
{
    use HasFactory;

    protected $table = 'meal_options';
    protected $fillable =['id', 'meal_id' , 'option_id'];
}
