<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FoodOrder;
use App\Models\OrderedFood;
use App\Models\Payment;
use App\Models\Seat;
use App\Models\SeatType;
use App\Models\Ticket;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use function abort;
use function redirect;
use function session;
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

    public function cancel(Request $request) {
        $request->session()->forget('movie');
        $request->session()->forget('cinema');
        $request->session()->forget('datetime');
        $request->session()->forget('twinSeat');
        $request->session()->forget('classicSeat');
        $request->session()->forget('twinQty');
        $request->session()->forget('classicQty');

        return redirect('/home');
    }

    public function add(Request $request) {

        $userid = Auth::user()->id;

        try {
            Payment::create([
                'amount' => $request->session()->get('amount'),
                'method' => $request->session()->get('method'),
                'user_id' => $userid,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

            $paymentid = Payment::latest()->first()->id;

            $cart = DB::table('carts')
                    ->select('*')
                    ->get();

            if ($cart != null) {
                FoodOrder::create([
                    'total_amount' => $request->session()->get('amount'),
                    'payment_id' => $paymentid,
                    'user_id' => $userid,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);

                $orderid = FoodOrder::latest()->first()->id;

                foreach ($cart as $item) {
                    OrderedFood::create([
                        'food_id' => $item->foodID,
                        'food_order_id' => $orderid,
                        'created_at' => Carbon::now()->toDateTimeString(),
                    ]);
                }

                Cart::truncate();
            }

            if (Session::has('movie')) {

                $showtimes = DB::table('showtimes')
                        ->select('*')
                        ->where('moviesID', '=', $request->session()->get('movie'))
                        ->where('cinemaID', '=', $request->session()->get('cinema'))
                        ->where('datetime', '=', $request->session()->get('datetime'))
                        ->get();

                Ticket::create([
                    'total_amount' => $request->session()->get('amount'),
                    'showtimes_id' => $showtimes->first()->id,
                    'payment_id' => $paymentid,
                    'user_id' => $userid,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);

                $ticketid = Ticket::latest()->first()->id;

                foreach (session()->get('twinSeat') as $twin) {
                    $row = substr($twin, 0, 1);
                    $num = substr($twin, 1);
                    Seat::create([
                        'row' => $row,
                        'number' => $num,
                        'seat_type_id' => 1,
                        'ticket_id' => $ticketid,
                        'created_at' => Carbon::now()->toDateTimeString(),
                    ]);
                }

                foreach (session()->get('classicSeat') as $classic) {
                    $row = substr($classic, 0, 1);
                    $num = substr($classic, 1);
                    Seat::create([
                        'row' => $row,
                        'number' => $num,
                        'seat_type_id' => 2,
                        'ticket_id' => $ticketid,
                        'created_at' => Carbon::now()->toDateTimeString(),
                    ]);
                }
            }

            return redirect('/payment/details');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function details(Request $request) {
        $movies = DB::table('tickets')
                ->select('*')
                ->where('tickets.id', '=', Ticket::latest()->first()->id)
                ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                ->get();

        $cinemas = DB::table('tickets')
                ->select('*')
                ->where('tickets.id', '=', Ticket::latest()->first()->id)
                ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                ->get();

        $seats = DB::table('seats')
                ->select('*')
                ->where('seats.ticket_id', '=', Ticket::latest()->first()->id)
                ->join('tickets', 'seats.ticket_id', '=', 'tickets.id')
                ->get();

        $foods = DB::table('tickets')
                ->select('*')
                ->join('food_orders', 'food_orders.payment_id', '=', 'tickets.payment_id')
                ->join('ordered_food', 'ordered_food.food_order_id', '=', 'food_orders.id')
                ->join('foods', 'ordered_food.food_id', '=', 'foods.id')
                ->get();

        $payments = DB::table('payments')
                ->select('*')
                ->join('tickets', 'tickets.payment_id', '=', 'payments.id')
                ->where('tickets.id', Ticket::latest()->first()->id)
                ->get();

        return view('payment.details', [
            'movies' => $movies,
            'cinemas' => $cinemas,
            'seats' => $seats,
            'foods' => $foods,
            'payments' => $payments
        ]);
    }

}
