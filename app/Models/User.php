<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at',
        'is_admin'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // favorites table
    public function meal()
    {
        return $this->belongsToMany(Meal::class , 'favourites' , 'user_id' , 'meal_id');
    }


    // option reservations
    public function order()
    {
        return $this->belongsToMany(Order::class , 'reservations' , 'user_id' , 'order_id');
    }
//    public function reservation(){
//        return $this->hasMany(Reservation::class ,'');
//    }


    // option reservations
    public function table()
    {
        return $this->belongsToMany(Table::class , 'reservations' , 'user_id' , 'table_id');
    }
}
