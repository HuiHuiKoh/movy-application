<?php

namespace App\Respositories;

use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class SalesRepository {

    public function getAmount($year) {
        $amount = Payment::select(DB::raw("SUM(amount) as sum"))
                ->whereYear('created_at', $year)
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('sum');

        $months = Payment::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date($year))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
        
        #$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        $datas = array_fill(0, 12, 0);

        foreach ($months as $index => $month) {
            $datas[$month] = $amount[$index];
        }


        return $datas;
    }

}
