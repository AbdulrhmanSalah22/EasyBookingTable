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

    protected $hidden = ['created_at','updated_at'];

    public function category(){

        return $this->belongsTo(Category::class , 'category_id','id');

    }
}
