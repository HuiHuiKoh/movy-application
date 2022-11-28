<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use function view;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index() {
        $movies = Movies::all();
        return view('homepage', ['movies' => $movies]);
    }

}
