<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $hidden = ['created_at','updated_at', 'pivot'];
    protected $fillable = ['name'];


    // option table
    public function meal()
    {
        return $this->belongsToMany(Meal::class , 'meal_options' , 'meal_id' , 'option_id');
    }

}
