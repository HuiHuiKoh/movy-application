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

class ShowtimesController extends Controller {

    public function showList() {

        try {
//            $movies = Movies::all();
            $movies = DB::table('showtimes')
                ->join('movies','cinemas','showtimes.moviesID', '=', 'movies.id','showtimes.cinemaID', '=', 'cinemas.id')
                ->select('movies.*','cinemas.id as cinemas_id','cinemas.name as cinemas_name')              
                ->get();
//            return json_decode($books);
            return view('admin.showtimesList', compact('movies'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

//    public function showtimesList() {
//
//
//        try {
//     
//            $movies = DB::table('showtimes')
//                    ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
//                    ->select('movies.*', 'showtimes.dateTime','showtimes.hall')
//                    ->get();
////            return json_decode($books);
//            return view('admin.showtimesList', compact('movies'));
//        } catch (QueryException $e) {
//            abort(500);
//        }
//    }



    public function newShowtimes() {
        return view('admin.addShowtimes');
    }

    public function cinemaOption() {
        $cinemas = Cinema::all();
        $movies = Movies::all();
        return view('admin.addShowtimes', ['cinemas' => $cinemas],['movies' => $movies]);
    }
    
    public function moviesOption() {
        $movies = Movies::all();
        return view('admin.addShowtimes', ['movies' => $movies]);
    }

    public function store(ShowtimesRequest $request) {


        $request->validationData();

        try {
            Showtimes::create([
                'name' => $request->get('name'),
                'dateTime' => $request->get('dateTime'),
                'cinemaID' => $request->get('cinema'),
                'moviesID' => $request->get('name'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'Showtimes has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function destroy($id) {
        try {
            Movies::find($id)->delete();
            return redirect()->back()->with('success', 'Movies has been deleted.');
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

    public function add(Request $request, $id) {

        $moviesID = Movies::find($id);

        $movies = DB::table('showtimes')
                ->join('movies','cinemas','showtimes.moviesID', '=', 'movies.id','showtimes.cinemaID', '=', 'cinemas.id')
                ->select('movies.*', 'cinemas.*')              
                ->get();

        $this->validate($request, [
            'name' => 'required|string|max:250',
            'dateTime' => 'required',
            'hall' => 'required|integer',
            'cinema' => 'required',
        ]);
      
        $movies->name = $request->get('name');
        $movies->dateTime = $request->get('dateTime');
        $movies->hall = $request->get('hall');
        $movies->cinemaID = $request->get('cinema');
        $movies->moviesID = $request->$moviesID;
        $movies->created_at = Carbon::now()->toDateTimeString();

        $movies->save();

        return redirect()->back()->with('success', 'Showtimes has been added.');
    }

}
