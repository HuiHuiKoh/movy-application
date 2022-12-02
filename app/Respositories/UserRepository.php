<?php

namespace App\Respositories;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserRepository {

    public function getNewUser($year) {
        $users = User::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at', $year)
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

        $months = User::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date($year))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');

        #$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);

        $datas = array_fill(0, 12, 0);

        foreach ($months as $index => $month) {
            $datas[$month] = $users[$index];
        }
        
        return $datas;
    }

}
