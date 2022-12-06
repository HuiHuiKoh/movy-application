<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SeatTypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('seat_types')->insert([
            [
                'id' => 1,
                'seat_type' => "Twin",
                'price' => 48.00,
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'seat_type' => "Classic",
                'price' => 15.00,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }

}
