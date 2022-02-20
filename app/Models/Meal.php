<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Meal extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable =['id','name','price','description','category_id'];

    protected $hidden = ['created_at','updated_at', 'pivot'];

    public function category(){

        return $this->belongsTo(Category::class , 'category_id','id');

    }

     // favorites table 
    public function user()
    {
        return $this->belongsToMany(User::class , 'favourites' , 'user_id' , 'meal_id');
    }


     // option table 
     public function option()
     {
         return $this->belongsToMany(Option::class , 'meal_options' , 'meal_id' , 'option_id');
     }
}
