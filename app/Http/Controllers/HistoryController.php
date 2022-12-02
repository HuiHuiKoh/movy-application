<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller {

    public function view() {

        $userid = Auth::user()->id;
        $payments = DB::table('payments')
                ->where('payments.user_id', $userid)
                ->select('payments.*', 'payments.id as paymentID')
                ->get();
        return view('purchaseHistory', ['payments' => $payments]);
    }

}
