<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//Koh Hui Hui
Route::get('/home', [HomeController::class, 'index']);
Route::get('/membership', [MembershipController::class, 'membership']);
Route::get('/forum', [ForumController::class, 'forum']);
Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
//    Route::get('/{movieId}', [BookingController::class, 'datetime']);
    Route::get('/seats', [BookingController::class, 'seat']);
//    Route::get('/{cinemaId}', [BookingController::class, 'seat']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/f&b', function () {
    return view('f&b');
});

//Siah Xin Ying
//Movies
Route::get('/showtimes', [MoviesController::class, 'show']);
Route::get('/movies/{id}', [MoviesController::class, 'moviesDetails']);

//Foods
Route::get('/foods', [FoodsController::class, 'showFoods']);
Route::get('/foodInfo/{id}', [FoodsController::class, 'foodInfo']);

//add Movies
Route::get('/addMovies', [MoviesController::class, 'newMovies']);
Route::post('/addMovies/store', [MoviesController::class, 'store']);
Route::get('/addMovies', [MoviesController::class, 'categoryOption']);

//show Movies List
Route::get('/moviesList', [MoviesController::class, 'showMoviesList']);

//delete Movies
Route::delete('moviesList/{id}', [MoviesController::class, 'destroy']);

//update Movies
Route::get('updateMovies/{id}', [MoviesController::class, 'categoryOption']);
Route::get('updateMovies/{id}', [MoviesController::class, 'edit']);
Route::post('updateMovies/{id}', [MoviesController::class, 'update']);


// Auth::routes();