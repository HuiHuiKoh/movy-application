<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

    public function seat() {
        echo 'console.log('.session()->get('movieId').')';
        echo 'console.log('.$date.')';
        echo 'console.log('.$time.')';
        return view('booking.seat');
    }

    public function check() {
        return view('booking.check');
    }

}
