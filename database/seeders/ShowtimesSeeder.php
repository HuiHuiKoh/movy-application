<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShowtimesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('showtimes')->insert([
            [
                'dateTime' => "2022-12-21 12:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 18:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 21:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 18:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 21:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 18:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 21:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 18:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 21:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 08:00:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:30:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:30:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 08:00:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:30:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:30:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 08:00:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:30:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:30:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 08:00:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 12:30:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-21 15:30:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 18:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 21:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 18:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 21:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 18:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 21:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 18:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 21:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 08:00:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:30:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:30:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 08:00:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:30:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:30:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 08:00:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:30:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:30:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 08:00:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 12:30:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-22 15:30:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 18:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 21:00:00",
                'hall' => "1",
                'cinemaID' => "2",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 18:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 21:00:00",
                'hall' => "2",
                'cinemaID' => "2",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 18:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 21:00:00",
                'hall' => "3",
                'cinemaID' => "2",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 18:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 21:00:00",
                'hall' => "4",
                'cinemaID' => "2",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 08:00:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:30:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:30:00",
                'hall' => "1",
                'cinemaID' => "1",
                'moviesID' => "1",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 08:00:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:30:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:30:00",
                'hall' => "2",
                'cinemaID' => "1",
                'moviesID' => "2",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 08:00:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:30:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:30:00",
                'hall' => "3",
                'cinemaID' => "1",
                'moviesID' => "3",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 08:00:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 12:30:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'dateTime' => "2022-12-23 15:30:00",
                'hall' => "4",
                'cinemaID' => "1",
                'moviesID' => "4",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }

}
