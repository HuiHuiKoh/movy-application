<?php

namespace App\Http\Controllers;

/**
 * @author Koh Hui Hui
 */

class BookingController extends Controller {

    public function index() {
        return view('booking.index');
    }

    public function seat() {
        return view('booking.seat');
    }

}
