<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('foods')->insert([
            [
                'name' => "E-Sprite",
                'description' => "1 x E-Sprite Grape Flavor",
                'price' => "5",
                'image' => "foods1.jpg",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => "Popcorn",
                'description' => "1 x Large Popcorn",
                'price' => "12",
                'image' => "foods2.jpg",
                'created_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }

}
