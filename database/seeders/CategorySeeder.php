<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,10) as $num){
          $cat =  Category::create([
                'name' => $faker-> name() ,
            ]);
//            $cat ->addMedia('/home/userh/Dessert.jpeg')->toMediaCollection('Category_img');
        }
//        public_path('/storage/'.$num.'/'.$num.'.jpeg')
    }
}
