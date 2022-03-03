<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_id =  DB::table('users')->pluck('id');
        $order_id =  DB::table('orders')->pluck('id');
        $table_id =  DB::table('users')->pluck('id');
        return [
            
            'count' => $this->faker->numberBetween(1, 6),
            'user_id' => $this->faker->randomElement($user_id),
            'order_id' => $this->faker->randomElement($order_id),
            'table_id' => $this->faker->randomElement($table_id),
            'day' => $this->faker->date(),
            'time_in' => Carbon::now(),
            'time_out' => Carbon::now(),
        ];
    }
}
