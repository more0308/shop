<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i< 7; $i++) {
            DB::table('categories')->insert([
                'title' => "Категория $i"

            ]);
            for($j = 1; $j< 20; $j++) {
                DB::table('products')->insert([
                    'title' => "Продукт $i$j",
                    'category_id'=>$i,
                    'describe'=>'ооооооооооо оооооооооооо оооооооооо чень большой текст',
                    'price'=>rand(1000,5000),
                    'image'=>'assets/image/1.jpg',
                    'created_at'=>Carbon::now()
                ]);
                for($a = 1; $a< 5; $a++) {
                    DB::table('comments')->insert([
                        'user_id' => 1,
                        'product_id'=>rand(0,20),
                        'is_valid'=>'0',
                        'describe'=>'ооооооооооо оооооооооооо оооооооооо чень большой текст',
                        'created_at'=>Carbon::now()
                    ]);

                }
            }
        }

    }
}
