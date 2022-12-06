<?php

namespace App\Http\Controllers;

use App\Models\SeatType;
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
                ->get();

        $showCinema = DB::table('showtimes')
                ->select('cinemas.id', 'cinemas.name')
                ->distinct()
                ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
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
                ->where('datetime', '=', $request->time)
                ->get();
        
        $cinema = DB::table('cinemas')
                ->select('*')
                ->where('id', '=', $request->cinema)
                ->get();
        
        $seatType = SeatType::all();
        
        

        return view('booking.seat', [
            'seatTypes' => $seatType,
            'movieSel' => $movies,
            'cinemaSel' => $cinema,
            'showtimes' => $showtimes,
            'dateSel' => Carbon::parse($request->time)->format('d-M-Y'),
            'timeSel' => Carbon::parse($request->time)->format('h:i a')
        ]);
    }

    public function check() {
        return view('booking.check');
    }

}
