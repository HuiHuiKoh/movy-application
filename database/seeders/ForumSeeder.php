<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('forums')->insert([
            [
                'id' => 1,
                'title' => "General Movie Discussion",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'title' => "Movie Reviews",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'title' => "Movie Questions",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'title' => "Actors, Awards, & Directors",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 5,
                'title' => "Home Theater Questions & Information",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 6,
                'title' => "Upcoming Movies",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }

}
