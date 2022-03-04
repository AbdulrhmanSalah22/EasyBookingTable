<?php


namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ];
    }
}
