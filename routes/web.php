<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShowtimesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', [HomeController::class, 'index']);

//Koh Hui Hui
//Client-Side
//Ticketing
Route::prefix('booking')->group(function () {
    Route::get('/{id}', [BookingController::class, 'index']);
    Route::get('/{cinemaId}/{hallNo}/seats', [BookingController::class, 'seat']);
    Route::get('/check', [BookingController::class, 'check']);
});

//Payment
Route::prefix('payment')->group(function () {
    Route::get('/form', [PaymentController::class, 'form']);
    Route::get('/details', [PaymentController::class, 'details']);
});

//Membership
Route::prefix('membership')->group(function () {
    Route::get('/', [MembershipController::class, 'index']);
    Route::get('/{memberId}/check', [MembershipController::class, 'check']);
    Route::get('/voucher', [MembershipController::class, 'voucher']);
});

//Forum
Route::prefix('forum')->group(function () {
    Route::get('/forum', [ForumController::class, 'forum']);
    Route::get('/thread', [ForumController::class, 'thread']);
    Route::get('/login', [ForumController::class, 'login']);
    Route::get('/register', [ForumController::class, 'register']);
});

//About
Route::get('/about', function () {
    return view('about');
});

//Contact
Route::get('/contact', function () {
    return view('contact');
});

//Koh Hui Hui
//Admin-Side
//Membership Promotion
Route::prefix('promotion')->group(function () {
    Route::get('/add', [MembershipController::class, 'addPromotion']);
    Route::get('/list', [MembershipController::class, 'listPromotion']);
    Route::get('/delete/{id}', [MembershipController::class, 'deletePromotion']);
    Route::get('/update/{id}', [MembershipController::class, 'updatePromotion']);
});

//Membership Voucher
Route::prefix('voucher')->group(function () {
    Route::get('/add', [MembershipController::class, 'addVoucher']);
    Route::get('/list', [MembershipController::class, 'listVoucher']);
    Route::get('/delete/{id}', [MembershipController::class, 'deleteVoucher']);
    Route::get('/update/{id}', [MembershipController::class, 'updateVoucher']);
});

//Siah Xin Ying
//Client-side
//Movies
Route::get('/showtimes', [MoviesController::class, 'show']);
Route::get('/movies/{id}', [MoviesController::class, 'moviesDetails']);

//Foods
Route::get('/foods', [FoodsController::class, 'showFoods']);
Route::get('/foodInfo/{id}', [FoodsController::class, 'foodInfo']);

//Cart
Route::get('cart', [CartController::class, 'cartList']);
Route::post('addCart', [CartController::class, 'store']);

//delete cart
Route::delete('destroy/{id}', [CartController::class, 'destroy']);
//Route::get('destroy/{id}',[CartController::class, 'destroy']);

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

//restore Movies
Route::get('/restoreMovies', [MoviesController::class, 'showTrashed']);
Route::get('restoreMovies/{id}', [MoviesController::class, 'restore']);

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

//restore Foods
Route::get('/restoreFoods',[FoodsController::class,'showTrashed']);
Route::get('restoreFoods/{id}', [FoodsController::class, 'restore']);

//add Showtimes
Route::get('/addShowtimes', [ShowtimesController::class, 'newShowtimes']);
Route::post('/addShowtimes/store', [ShowtimesController::class, 'store']);
Route::get('/addShowtimes', [ShowtimesController::class, 'cinemaOption']);

//show Showtimes List
Route::get('showtimesList', [ShowtimesController::class, 'showList']);

//delete Showtimes
Route::delete('showtimesList/{id}', [ShowtimesController::class, 'destroy']);

//restore Showtimes
Route::get('/restoreShowtimes', [ShowtimesController::class, 'showTrashed']);
Route::get('restoreShowtimes/{id}', [ShowtimesController::class, 'restore']);

//login page
Route::controller(UserController::class)->group(function () {
    Route::get('login', 'show')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('user.validate_registration');

    Route::post('validate_login', 'validate_login')->name('user.validate_login');

    Route::get('homepage', 'homepage')->name('homepage');
});

//Chart
Route::get('/userReport', [ChartController::class,'viewUser']);
Route::POST('/chart', [ChartController::class,'getNewUser']);
Route::POST('/amountChart', [ChartController::class,'getAmount']);
Route::get('/salesReport', [ChartController::class,'viewSales']);

//Purchase History
Route::get('purchaseHistory', [HistoryController::class,'view']);

// Auth::routes();
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
