<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $name = fake()->name(20);
            Product::create([
                'category_id' => rand(1, 5),
                'sku' => Str::random(5),
                'name' => $name,
                'image' => fake()->imageUrl(),
                'price' => 100000,
                'quantity' => 10,
                'description' => fake()->text(20)
            ]);
        }
    }
}
