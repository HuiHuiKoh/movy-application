<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShowtimesRequest;
use Carbon\Carbon;
use App\Models\Showtimes;
use App\Models\Cinema;
Use Illuminate\Support\Facades\DB;

class ShowtimesController extends Controller {

    public function showtimesList() {


        try {
//            $showtimes = Showtimes::all();
//            $products = DB::table('carts')
//                ->join('products', 'carts.product_id', '=', 'products.id')
//                ->where('carts.user_id', $userid)
//                ->select('products.*', 'carts.quantity', 'carts.id as cart_id')
//                ->get();
//
//        return view('cart', compact('products'));
//        
            $movies = DB::table('showtimes')
                    ->join('movies', 'showtimes.moviesID', '=', 'movies.id')
                    ->select('movies.*', 'showtimes.*')
                    ->get();
//            return json_decode($books);
            return view('admin.showtimesList', compact('movies'));
        } catch (QueryException $e) {
            abort(500);
        }
    }
    
    public function edit($id) {
        try {
            $movies = Movies::find($id);
            return view('admin.updateMovies', compact('movies', 'id'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function newShowtimes() {
        return view('admin.addShowtimes');
    }

    public function cinemaOption() {
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
    
    public function destroy($id) {
        try {
            Movies::find($id)->delete();
            return redirect()->back()->with('success', 'Movies has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

}
