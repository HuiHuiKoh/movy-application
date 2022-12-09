<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Seat;
use App\Models\SeatType;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use function view;

/**
 * @author Koh Hui Hui
 */
class BookingController extends Controller {

    public function index($id) {

        $movies = DB::table('movies')
                ->select('*')
                ->where('id', '=', $id)
                ->get();

        $showtimes = DB::table('showtimes')
                ->select('*')
                ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                ->where('showtimes.moviesID', '=', $id)
                ->where('showtimes.dateTime', '>', Carbon::now()->toDateTimeString())
                ->orderBy('showtimes.dateTime', 'asc')
                ->get();

        $showCinema = DB::table('showtimes')
                ->select('cinemas.id', 'cinemas.name')
                ->distinct()
                ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                ->where('showtimes.dateTime', '>', Carbon::now()->toDateTimeString())
                ->get();

        return view('booking.index', [
            'showtimes' => $showtimes,
            'cinema' => $showCinema,
            'movies' => $movies]);
    }

    public function store(Request $request) {

        $movies = DB::table('movies')
                ->select('*')
                ->where('id', '=', $request->movie)
                ->get();

        $showtimes = DB::table('showtimes')
                ->select('*')
                ->where('moviesID', '=', $request->movie)
                ->where('cinemaID', '=', $request->cinema)
                ->where('datetime', '=', $request->datetime)
                ->get();

        $cinema = DB::table('cinemas')
                ->select('*')
                ->where('id', '=', $request->cinema)
                ->get();

        $seatType = SeatType::all();
        $seats = Seat::all();

        $request->session()->put('movie', $request->movie);
        $request->session()->put('cinema', $request->cinema);
        $request->session()->put('datetime', $request->datetime);

        return view('booking.seat', [
            'seatTypes' => $seatType,
            'seats' => $seats,
            'movieSel' => $movies,
            'cinemaSel' => $cinema,
            'showtimes' => $showtimes,
            'dateSel' => Carbon::parse($request->datetime)->format('d-M-Y'),
            'timeSel' => Carbon::parse($request->datetime)->format('h:i a')
        ]);
    }

    public function check() {
        $tickets = DB::table('tickets')
                ->select('movies.name', 'tickets.id')
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
                    ->join('tickets', 'seats.ticket_id', '=', 'tickets.id')
                    ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                    ->orderBy('showtimes.dateTime', 'asc')
                    ->get();
            $showtimes = DB::table('tickets')
                    ->select('*')
                    ->where('showtimes.dateTime', '>', Carbon::now()->toDateTimeString())
                    ->join('showtimes', 'tickets.showtimes_id', '=', 'showtimes.id')
                    ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                    ->orderBy('showtimes.dateTime', 'asc')
                    ->get();
        }
        echo '<script>console.log(' . $seats . ')</script>';
        return view('booking.check', [
            'tickets' => $tickets,
            'showtimes' => $showtimes,
            'seats' => $seats,
        ]);
    }

}
