<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            CategoriesSeeder::class,
            CinemaSeeder::class,
            FoodsSeeder::class,
            MoviesSeeder::class,
            ShowtimesSeeder::class,
            SeatTypeSeeder::class,
            PromotionSeeder::class,
            VoucherSeeder::class,
            ForumSeeder::class,
        ]);
    }

}
