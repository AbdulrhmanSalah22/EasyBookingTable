<?php

namespace App\Models;

use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory , MediaAlly  ;

   protected $fillable =['id','name'];

   protected $hidden = ['created_at','updated_at'];

    public function meal()
    {
        return $this->hasMany(Meal::class , 'category_id' ,'id');
    }
}
