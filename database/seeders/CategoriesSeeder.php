<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'category' => "Now Showing",
                'slug' => "nowshowing",
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'category' => "Coming Soon",
                'slug' => "comingsoon",
                'status' => 1,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
