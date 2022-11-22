<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShowtimesRequest;
use Carbon\Carbon;
use App\Models\Showtimes;
use App\Models\Hall;
use App\Models\Cinema;


class ShowtimesController extends Controller
{
    public function showtimesList() {

        try {
            $showtimes = Showtimes::all();
//            return json_decode($books);
            return view('admin.showtimesList', compact('showtimes'));
        } catch (QueryException $e) {
            abort(500);
        }
    }
    
    public function newShowtimes() {
        return view('admin.addShowtimes');
    }
    
    public function hallsOption(){
        $halls = Hall::all();
        return view('admin.addShowtimes',['halls' => $halls]);
    }
    
    public function cinemaOption(){
        $cinemas = Cinema::all();
        return view('admin.addShowtimes', ['cinemas' => $cinemas]);
    }
    
    public function store(ShowtimesRequest $request) {

        
        $request->validationData();
        
        try {
            Showtimes::create([
                'name' => $request->get('name'),
                'dateTime' => $request->get('dateTime'),
                'cinemaID' => $request->get('cinema'),
                'hallID' => $request->get('hall'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'Showtimes has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }
    
}
