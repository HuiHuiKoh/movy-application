<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;
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
                ->get();
//        echo "<script>console.log(" . $dateFormat . ")</script>";
        return view('booking.index', [
            'showtimes' => $showtimes,
            'movies' => $movies]);
    }

    public function seat() {
        return view('booking.seat');
    }

}
