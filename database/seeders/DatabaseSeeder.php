<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

//         Table::factory(6)->create();

        //  / To add Seeder in order table
//         Order::factory(3)->create();


        //  / To add Seeder in reservation table to work easy :D
//         Reservation::factory(3)->create();

         \App\Models\User::factory()->create(
             [
                 'name' => 'Admin',
                 'email' => 'admin@admin.com',
                 'password' => Hash::make('123456'),
                 'phone' => '01045782305',
                 'is_admin' => true
             ]
         );

}
}
