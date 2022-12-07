<?php

namespace App\Http\Controllers;

use App\Models\SeatType;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function view;

/**
 * @author Koh Hui Hui
 */
class PaymentController extends Controller {

    public function store(Request $request) {
        $seatType = SeatType::all();
        $cart = DB::table('carts')
                ->select('foods.*', 'carts.quantity', 'carts.id as cartID')
                ->join('foods', 'carts.foodID', '=', 'foods.id')
                ->get();
        return view('payment.form', [
            'foodTotal' => $request->foodTotal,
            'seatType' => $seatType,
            'cart' => $cart
        ]);
    }

    public function details() {
        return view('payment.details');
    }

}
