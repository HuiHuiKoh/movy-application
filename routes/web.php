<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShowtimesController;
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
Route::get('/forum', [ForumController::class, 'forum']);
Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'index']);
//    Route::get('/{movieId}', [BookingController::class, 'index']);
    Route::get('/seats', [BookingController::class, 'seat']);
//    Route::get('/{cinemaId}/{hallNo}/seats', [BookingController::class, 'seat']);
});
Route::prefix('payment')->group(function () {
    Route::get('/form', [PaymentController::class, 'form']);
    Route::get('/details', [PaymentController::class, 'details']);
});
Route::prefix('membership')->group(function () {
    Route::get('/', [MembershipController::class, 'index']);
    Route::get('/{memberId}/check', [MembershipController::class, 'check']);
    Route::get('/voucher', [MembershipController::class, 'voucher']);
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
//Client-side
//Movies
Route::get('/showtimes', [MoviesController::class, 'show']);
Route::get('/movies/{id}', [MoviesController::class, 'moviesDetails']);

//Foods
Route::get('/foods', [FoodsController::class, 'showFoods']);
Route::get('/foodInfo/{id}', [FoodsController::class, 'foodInfo']);

//Admin-side
//add Movies
Route::get('/addMovies', [MoviesController::class, 'newMovies']);
Route::post('/addMovies/store', [MoviesController::class, 'store']);
Route::get('/addMovies', [MoviesController::class, 'categoryOption']);

//show Movies List
Route::get('/moviesList', [MoviesController::class, 'showMoviesList']);

//delete Movies
Route::delete('moviesList/{id}', [MoviesController::class, 'destroy']);

//update Movies
//Route::get('updateMovies/{id}', [MoviesController::class, 'category']);
Route::get('updateMovies/{id}', [MoviesController::class, 'edit']);
Route::post('updateMovies/{id}', [MoviesController::class, 'update']);

//add Foods
Route::get('/addFoods', [FoodsController::class, 'newFoods']);
Route::post('/addFoods/store', [FoodsController::class, 'store']);

//show Food List
Route::get('/foodList', [FoodsController::class, 'showFoodsList']);

//delete Food
Route::delete('foodList/{id}', [FoodsController::class, 'destroy']);

//update Foods
Route::get('updateFoods/{id}', [FoodsController::class, 'edit']);
Route::post('updateFoods/{id}', [FoodsController::class, 'update']);

//add Showtimes
Route::get('/addShowtimes', [ShowtimesController::class, 'newShowtimes']);
Route::post('/addShowtimes/store', [ShowtimesController::class, 'store']);
Route::get('/addShowtimes', [ShowtimesController::class, 'cinemaOption']);



Route::delete('showtimesList/{id}', [ShowtimesController::class, 'destroy']);

Route::get('showtimesList', [ShowtimesController::class, 'showList']);

// Auth::routes();