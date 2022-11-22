<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cinemas')->insert([
            [
                'id' => 1,
                'name' => "Movy in Nu Sentral",
                'address' => "Nu Sentral",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'name' => "Movy in 1 Utama",
                'address' => "1U",
                'created_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
