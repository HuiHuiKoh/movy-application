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
                'address' => "201, Jalan Tun Sambanthan, Brickfields, 50470 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'name' => "Movy in 1 Utama",
                'address' => "City Centre, 1, Lebuh Bandar Utama, Bandar Utama, 47800 Petaling Jaya, Selangor",
                'created_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }
}
