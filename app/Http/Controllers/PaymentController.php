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
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;
use function abort;
use function redirect;
use function session;
use function view;

/**
 * @author Koh Hui Hui
 */
class PaymentController extends Controller {

    public function view(Request $request) {

        $seatType = SeatType::all();
        $cart = DB::table('carts')
                ->select('foods.*', 'carts.quantity', 'carts.id as cartID')
                ->join('foods', 'carts.foodID', '=', 'foods.id')
                ->get();

        $foodTotal = 0;
        if (!$cart->isEmpty()) {
            foreach ($cart as $item) {
                $foodTotal += ($item->quantity * $item->price);
            }
        }
        return view('payment.form', [
            'foodTotal' => $foodTotal,
            'seatType' => $seatType,
            'cart' => $cart
        ]);
    }

    public function cancel() {
        Session::forget(['movie', 'cinema', 'datetime', 'twinSeat', 'classicSeat', 'twinQty', 'classicQty']);
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

                if (session()->has('twinSeat')) {
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
                }

                if (session()->has('classicSeat')) {
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

                Session::forget(['movie', 'cinema', 'datetime', 'twinSeat', 'classicSeat', 'twinQty', 'classicQty']);
            }

            return redirect('/payment/details');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function details(Request $request) {

        $payments = DB::table('payments')
                ->select('*')
                ->where('id', Payment::latest()->first()->id)
                ->get();

        $tickets = DB::table('tickets')
                ->select('*')
                ->where('payment_id', '=', Payment::latest()->first()->id)
                ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                ->get();

        $foods = DB::table('food_orders')
                ->select('*')
                ->where('payment_id', '=', Payment::latest()->first()->id)
                ->get();

        if (!$tickets->isEmpty()) {
            $seats = DB::table('seats')
                    ->select('*')
                    ->where('seats.ticket_id', '=', Ticket::latest()->first()->id)
                    ->join('tickets', 'seats.ticket_id', '=', 'tickets.id')
                    ->get();
            $showtimes = DB::table('tickets')
                    ->select('*')
                    ->where('tickets.id', '=', Ticket::latest()->first()->id)
                    ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                    ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                    ->get();
            if ($seats->isEmpty()) {
                $seats = null;
            } else if ($showtimes->isEmpty()) {
                $showtimes = null;
            }
        } else {
            $tickets = null;
            $showtimes = null;
            $seats = null;
        }

        if (!$foods->isEmpty()) {
            $ordered_foods = DB::table('ordered_food')
                    ->select('*')
                    ->where('ordered_food.food_order_id', '=', FoodOrder::latest()->first()->id)
                    ->join('foods', 'ordered_food.food_id', '=', 'foods.id')
                    ->get();

            if ($ordered_foods->isEmpty()) {
                $ordered_foods = null;
            }
        } else {
            $foods = null;
            $ordered_foods = null;
        }

        return view('payment.details', [
            'tickets' => $tickets,
            'showtimes' => $showtimes,
            'payments' => $payments,
            'seats' => $seats,
            'foods' => $ordered_foods
        ]);
    }

    public function print() {
        $payments = DB::table('payments')
                ->select('*')
                ->where('id', Payment::latest()->first()->id)
                ->get();

        $tickets = DB::table('tickets')
                ->select('*')
                ->where('payment_id', '=', Payment::latest()->first()->id)
                ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                ->get();

        $foods = DB::table('food_orders')
                ->select('*')
                ->where('payment_id', '=', Payment::latest()->first()->id)
                ->get();

        if (!$tickets->isEmpty()) {
            $seats = DB::table('seats')
                    ->select('*')
                    ->where('seats.ticket_id', '=', Ticket::latest()->first()->id)
                    ->join('tickets', 'seats.ticket_id', '=', 'tickets.id')
                    ->get();
            $showtimes = DB::table('tickets')
                    ->select('*')
                    ->where('tickets.id', '=', Ticket::latest()->first()->id)
                    ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                    ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                    ->get();
            if ($seats->isEmpty()) {
                $seats = null;
            } else if ($showtimes->isEmpty()) {
                $showtimes = null;
            }
        } else {
            $tickets = null;
            $showtimes = null;
            $seats = null;
        }

        if (!$foods->isEmpty()) {
            $ordered_foods = DB::table('ordered_food')
                    ->select('*')
                    ->where('ordered_food.food_order_id', '=', FoodOrder::latest()->first()->id)
                    ->join('foods', 'ordered_food.food_id', '=', 'foods.id')
                    ->get();

            if ($ordered_foods->isEmpty()) {
                $ordered_foods = null;
            }
        } else {
            $foods = null;
            $ordered_foods = null;
        }

        return view('payment.print', [
            'tickets' => $tickets,
            'showtimes' => $showtimes,
            'payments' => $payments,
            'seats' => $seats,
            'foods' => $ordered_foods
        ]);
    }

    public function ticket($id) {
        $tickets = DB::table('tickets')
                ->select('movies.name', 'tickets.id')
                ->where('tickets.id', '=', $id)
                ->where('showtimes.dateTime', '>', Carbon::now()->toDateTimeString())
                ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                ->orderBy('showtimes.dateTime', 'asc')
                ->get();

        if ($tickets->isEmpty()) {
            $tickets = null;
            $showtimes = null;
            $seats = null;
        } else {
            $seats = DB::table('seats')
                    ->select('*')
                    ->where('showtimes.dateTime', '>', Carbon::now()->toDateTimeString())
                    ->where('seats.ticket_id', '=', $id)
                    ->join('tickets', 'seats.ticket_id', '=', 'tickets.id')
                    ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                    ->orderBy('showtimes.dateTime', 'asc')
                    ->get();
            $showtimes = DB::table('tickets')
                    ->select('*')
                    ->where('tickets.id', '=', $id)
                    ->where('showtimes.dateTime', '>', Carbon::now()->toDateTimeString())
                    ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                    ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                    ->orderBy('showtimes.dateTime', 'asc')
                    ->get();
        }
        echo '<script>console.log(' . $seats . ')</script>';
        return view('payment.print', [
            'tickets' => $tickets,
            'showtimes' => $showtimes,
            'seats' => $seats,
        ]);
    }

}
