<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(14)->create();

        // for ($i = 1; $i < 10; $i++) {
        //     DB::table('users')->insert([
        //         'name' => fake()->name(10),
        //         'email' => fake()->name(10) . '@gmail.com',
        //         'password' => Hash::make(123)
        //     ]);
        // }

        // for ($i = 1; $i < 10; $i++) {
        //     User::create([
        //         'name' => Str::random(2),
        //         'email' => Str::random(10) . '@gmail.com',
        //         'password' => Hash::make(123)
        //     ]);
        // }


    }
}
