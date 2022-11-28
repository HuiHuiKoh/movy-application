<?php

namespace App\Http\Controllers;

use App\Models\Movies;
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
                ->join('movies', 'showtimes.name', '=', 'movies.name')
                ->get();

        // echo "<script>console.log(" . $movies.name . ")</script>";
        return view('booking.index', [
            'showtimes' => $showtimes,
            'movies' => $movies]);
    }

    public function seat() {
        return view('booking.seat');
    }

}
