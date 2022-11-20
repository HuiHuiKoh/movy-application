<?php

namespace App\Http\Controllers;
use App\Http\Requests\MoviesRequest;
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
    
    public function newMovies() {
        return view('admin.addMovies');
    }
    
    public function store(MoviesRequest $request) {

        $request->validationData();

        $file = $request->image;

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('C:\Users\USER\Documents\GitHub\movy-application\public\assets\img', $fileName);

        $code = ProductController::generateUniqueCode();

        try {
            Product::create([
                'name' => $request->get('name'),
                'releasedDate' => $request->get('releasedDate'),
                'image' => $fileName,
                
                
                
                'price' => $request->get('price'),
                'description' => $request->get('description'),
                'stock' => $request->get('stock'),
                'author' => $request->get('author'),
                'language' => $request->get('language'),
                'publisher' => $request->get('publisher'),
                'code' => $code,
                'image' => $fileName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'New Book has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }
}
