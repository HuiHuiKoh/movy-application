<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ForumUserTypeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('forum_user_types')->insert([
            [
                'id' => 1,
                'user_type' => "User",
                'created_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'user_type' => "Admin",
                'created_at' => Carbon::now()->toDateTimeString(),
            ]
        ]);
    }

}
