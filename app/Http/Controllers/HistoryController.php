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

    public function paymentDetails($id) {

        $payments = Payment::find($id);
        
        return view('purchaseHistoryDetails', compact('payments', 'id'));
    }

    public function details($id) {

        $userid = Auth::user()->id;
     
        $details = DB::table('movies')
                ->join('showtimes', 'showtimes.moviesID', '=', 'movies.id')
                ->join('tickets', 'tickets.showtimes_id', '=', 'showtimes.id')
                ->join('payments', 'payments.id', '=', 'tickets.payment_id')
                ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                ->where('payments.user_id', $userid)
                ->where('payments.id',$id)
                ->select('movies.*', 'showtimes.dateTime', 
                        'cinemas.name as cinemaName',
                        'tickets.total_amount as ticketsAmount')
                ->get();
        
        $foods = DB::table('foods')
                ->join('ordered_food','ordered_food.food_id','=','foods.id')
                ->join('food_orders','food_orders.id','=','ordered_food.food_order_id')
                ->join('payments','payments.id','=','food_orders.payment_id')
                ->where('payments.user_id',$userid)
                ->where('payments.id',$id)
                ->select('foods.*','food_orders.total_amount as foodsAmount')
                ->get();


        return view('purchaseHistoryDetails', ['details' => $details,'foods' => $foods]);
    }

}
