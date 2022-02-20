<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia ;

   protected $fillable =['id','name'];

   protected $hidden = ['created_at','updated_at'];

    public function meal()
    {
        return $this->hasMany(Meal::class , 'category_id' ,'id');
    }
}
