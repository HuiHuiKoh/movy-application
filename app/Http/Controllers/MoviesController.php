<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\MoviesRequest;
use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Category;
use Carbon\Carbon;

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
    
    public function newMovies() {
        return view('admin.addMovies');
    }
    
    public function categoryOption(){
        $categories = Category::all();
        return view('admin.addMovies', ['categories' => $categories]);
    }
    
    public function showMoviesList() {

        try {
            $movies = Movies::all();
//            return json_decode($books);
            return view('admin.moviesList', compact('movies'));
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
    
    public function store(MoviesRequest $request) {

        
        $request->validationData();

        $file = $request->image;

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('C:\Users\USER\Documents\GitHub\movy-application\public\assets\img', $fileName);
        
        try {
            Movies::create([
                'name' => $request->get('name'),
                'releasedDate' => $request->get('releasedDate'),
                'image' => $fileName,
                'casts' => $request->get('casts'),
                'synopsis' => $request->get('synopsis'),
                'language' => $request->get('language'),
                'type' => $request->get('type'),
                'duration' => $request->get('duration'),
                'trailer' => $request->get('trailer'),
                'director' => $request->get('director'),
                'categoryID' => $request->get('category'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'New Movies has been added.');
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
    
    public function update(Request $request, $id) {

        $moviesID = Movies::find($id);
        
//        $products = DB::table('carts')
//                ->join('products', 'carts.product_id', '=', 'products.id')
//                ->where('carts.user_id', $userid)
//                ->select('products.*', 'carts.quantity', 'carts.id as cart_id')
//                ->get();
//        
        $movies = DB::table('movies')
                ->join('categories', 'movies.categoryID', '=', 'categories.id')
                ->where('movies.id', $moviesID)
                ->select('movies.*', 'categories.*', 'categories.id as categoryID')
                ->get();

        

        $fileName = $movies->image;

        $this->validate($request, [
            'name' => 'required|string|max:250',
            'synopsis' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'casts' => 'required|string|max:400',
            'language' => 'required|string|max:20|min:3',
            'type' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
            'trailer' => 'required|string',
            'releasedDate' => 'required',
            'director' => 'required|string|max:100',
            'category' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('C:\Users\USER\Documents\GitHub\movy-application\public\assets\img', $fileName);
        }

        $movies->name = $request->get('name');
        $movies->releasedDate = $request->get('releasedDate');
        $movies->casts = $request->get('casts');
        $movies->synopsis = $request->get('synopsis');
        $movies->language = $request->get('language');
        $movies->type = $request->get('type');
        $movies->trailer = $request->get('trailer');
        $movies->director = $request->get('director');
        $movies->categoryID = $request->get('category');
        $movies->updated_at = Carbon::now()->toDateTimeString();
        $movies->image = $fileName;

        $movies->save();

        return redirect()->back()->with('success', 'Movies has been updated.');
    }
    
    
}
