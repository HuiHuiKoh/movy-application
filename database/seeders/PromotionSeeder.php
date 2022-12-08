<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('promotions')->insert([
            [
                'id' => 1,
                'title' => 'Avatar: The Way Of Water Exclusive Posters Promo',
                'description' => 'Purchase movie tickets at any selected participating cinema through MOVY online platforms and counter.',
                'image' => 'promo_avatar_poster.jpg',
                'created_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 2,
                'title' => 'New Flavour: Cajun Coney Promo',
                'description' => 'Cajun Coney with Chicken Cajun Sauce with combo or ala carte',
                'image' => 'promo_cajun.png',
                'created_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 3,
                'title' => 'Fried Mac and Cheese Pops Promo',
                'description' => 'Fried Mac and Cheese Pops with combo or ala carte',
                'image' => 'promo_cheese.png',
                'created_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 4,
                'title' => 'Christmas Sale 2022: Up to 50% OFF',
                'description' => 'Celebrate Christmas with MOVY',
                'image' => 'promo_christmas_sales.png',
                'created_at' => Carbon::now()->toDateTimeString()
            ],
            [
                'id' => 5,
                'title' => 'New Flavour: Salted Caramel Lemon Popcorn',
                'description' => 'Purchase movie tickets with foods at any selected participating cinema through MOVY online platforms or counter',
                'image' => 'promo_popcorn.png',
                'created_at' => Carbon::now()->toDateTimeString()
            ]
        ]);
    }

}
