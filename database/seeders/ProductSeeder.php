<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $proSeed = [];
        for($i = 1; $i<= 10;$i++){
            $proSeed[] = [
                'name' => "Sản phẩm số ".$i,
                'price'=>rand(1000,100000),
                'quantity'=>rand(10,100),
                'image'=>null,
                'category_id'=>rand(1, 10),
                'status'=>1
            ];
        }
        DB::table('products')->insert($proSeed);
    }
}
