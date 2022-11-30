<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShowtimesRequest;
use Carbon\Carbon;
use App\Models\Showtimes;
use App\Models\Cinema;
Use Illuminate\Support\Facades\DB;
use App\Models\Movies;
use App\Models\Hall;

class ShowtimesController extends Controller {

    public function showList() {

        try {

            $movies = DB::table('showtimes')
                    ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                    ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                    ->select('movies.name as movies_name', 'movies.image as movies_image', 'cinemas.name as cinemas_name', 'showtimes.*')
                    ->get();
//            return json_decode($books);
            return view('admin.showtimesList', compact('movies'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function newShowtimes() {
        return view('admin.addShowtimes');
    }

    public function cinemaOption() {
        $movies = Movies::all();
        $cinemas = Cinema::all();

        return view('admin.addShowtimes', ['movies' => $movies], ['cinemas' => $cinemas]);
    }

    public function store(ShowtimesRequest $request) {

        $request->validationData();

        try {
            Showtimes::create([
                'hall' => $request->get('hall'),
                'dateTime' => $request->get('dateTime'),
                'cinemaID' => $request->get('cinema'),
                'moviesID' => $request->get('movie'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'Showtimes has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function destroy($id) {
        try {
            Showtimes::find($id)->delete();
            return redirect()->back()->with('success', 'Showtimes has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function edit($id) {
        try {
            $movies = Movies::find($id);
            return view('admin.addShowtimes', compact('movies', 'id'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function showTrashed() {
        try {           
            $movies = Showtimes::onlyTrashed()
                    ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                    ->join('cinemas', 'showtimes.cinemaID', '=', 'cinemas.id')
                    ->select('movies.name as movies_name', 'movies.image as movies_image', 'cinemas.name as cinemas_name', 'showtimes.*')
                    ->get();
            
            return view('admin.restoreShowtimes', compact('movies'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function restore($id) {
        try {
            Showtimes::onlyTrashed()->find($id)->restore();
            return redirect()->back()->with('success', 'Showtimes has been restored.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

}
