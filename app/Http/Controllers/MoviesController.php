<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movies;

class MoviesController extends Controller
{
    public function show() {
        $movies = Movies::all();
        return view('showtimes', ['movies' => $movies]);
    }
    
    public function moviesDetails($id){
        
        $movies = Movies::find($id);      
        return view('movies',compact('movies','id'));
               
    }
}
