<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    
    public function store(Request $request) {

//        $request->validationData();

        $file = $request->image;

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('C:\Users\USER\Documents\GitHub\movy-application\public\assets\img', $fileName);
        

//        $code = MoviesController::generateUniqueCode();

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
            return redirect()->back()->with('success', 'New Book has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }
}
