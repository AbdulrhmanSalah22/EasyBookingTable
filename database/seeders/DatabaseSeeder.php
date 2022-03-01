<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

//        \App\Models\Order::factory(3)->create();

        \App\Models\User::factory()->create(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'phone' => '01045782305',
                'is_admin' => true
            ]
        );
        //*************************************************** */
        // $products = factory('App\Product', 25)->create();

        // $faker = Faker::create();
        // $imageUrl = $faker->imageUrl(640,480, null, false);

        // foreach($products as $product){
        //     $gift->addMediaFromUrl($imageUrl)->toMediaCollection('images');
        // }


}
}
