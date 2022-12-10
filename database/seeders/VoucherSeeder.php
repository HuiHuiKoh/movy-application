<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('vouchers')->insert([
            [
                'id' => 1,
                'title' => "Save RM18 OFF Movy New User Voucher Code On Anything",
                'code' => 'VC18',
                'discount_amount' => 18.00,
                'exp_date' => '2023-01-31',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'title' => "Save RM10 OFF Movy Promo Code Malaysia On Movie Ticket Purchase",
                'code' => 'VC10',
                'discount_amount' => 10.00,
                'exp_date' => '2023-02-28',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'title' => "Grab Up To RM50 OFF Christmas Deals",
                'code' => 'VC50P',
                'discount_amount' => 50.00,
                'exp_date' => '2023-12-31',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'title' => "Get RM35 OFF Movy Promo Code On Food Purchase",
                'code' => 'VC35P',
                'discount_amount' => 35.00,
                'exp_date' => '2023-01-31',
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }

}
