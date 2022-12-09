<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\FoodsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShowtimesController;
use App\Http\Controllers\UserController;
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
//About
Route::get('/about', function () {
    return view('about');
});
//Contact
Route::get('/contact', function () {
    return view('contact');
});

//User must login
Route::group(['middleware' => ['auth']], function () {

//Koh Hui Hui
//Client-Side
//Ticketing
    Route::prefix('booking')->group(function () {
        Route::get('/{id}', [BookingController::class, 'index']);
        Route::post('/seats/store', [BookingController::class, 'store']);
    });

//Payment
    Route::prefix('payment')->group(function () {
        Route::any('/form/view', [PaymentController::class, 'view']);
        Route::any('/form/cancel', [PaymentController::class, 'cancel']);
        Route::get('/details', [PaymentController::class, 'details']);
        Route::any('/details/add', [PaymentController::class, 'add']);
        Route::get('/print', [PaymentController::class, 'print']);
        Route::get('/ticket{id}', [PaymentController::class, 'ticket']);
    });
    
    

//Membership
    Route::prefix('membership')->group(function () {
        Route::get('/', [MembershipController::class, 'index']);
        Route::get('/check', [MembershipController::class, 'check']);
        Route::get('/voucher', [MembershipController::class, 'voucher']);
    });

//Check Booking
    Route::get('/check', [BookingController::class, 'check']);

//Forum
    Route::prefix('forum')->group(function () {
        Route::get('/', [ForumController::class, 'index']);
        Route::get('/thread', [ForumController::class, 'thread']);
    });

//Siah Xin Ying
//Client-Side
    Route::post('addCart', [CartController::class, 'store']);
//Cart
    Route::get('cart', [CartController::class, 'cartList']);

//Purchase History
    Route::get('purchaseHistory', [HistoryController::class, 'view']);
    Route::post('purchaseHistoryDetails/{id}', [HistoryController::class, 'paymentDetails']);
    Route::get('purchaseHistoryDetails/{id}', [HistoryController::class, 'details']);
});

// Auth::routes();
Auth::routes();

//Siah Xin Ying
//Client-side
//Movies
Route::get('/showtimes', [MoviesController::class, 'show']);
Route::get('/movies/{id}', [MoviesController::class, 'moviesDetails']);

//Foods
Route::any('/foods', [FoodsController::class, 'showFoods']);
Route::get('/foodInfo/{id}', [FoodsController::class, 'foodInfo']);

//delete cart
Route::delete('destroy/{id}', [CartController::class, 'destroy']);

//Categories function
Route::get('category/{slug}', [MoviesController::class, 'viewCategory']);

//Search Function
Route::get('search', [MoviesController::class, 'search']);

//Route::get('destroy/{id}',[CartController::class, 'destroy']);
//login page
Route::controller(UserController::class)->group(function () {
    Route::get('login', 'show')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('user.validate_registration');

    Route::post('validate_login', 'validate_login')->name('user.validate_login');

    Route::get('homepage', 'homepage')->name('homepage');
});

//only admin can see it
Route::group(['middleware' => ['auth', 'isAdmin']], function () {

//Siah Xin Ying
//Dashbroad
    Route::get('/dashboard', [UserController::class, 'viewDash']);

//Chart
    Route::get('/userReport', [ChartController::class, 'viewUser']);
    Route::get('/salesReport', [ChartController::class, 'viewSales']);
    Route::POST('/chart', [ChartController::class, 'getNewUser']);
    Route::POST('/amountChart', [ChartController::class, 'getAmount']);

//add Movies
    Route::get('/addMovies', [MoviesController::class, 'newMovies']);
    Route::get('/addMovies', [MoviesController::class, 'categoryOption']);
    Route::post('/addMovies/store', [MoviesController::class, 'store']);

//delete Movies
    Route::delete('moviesList/{id}', [MoviesController::class, 'destroy']);

//show Movies List
    Route::get('/moviesList', [MoviesController::class, 'showMoviesList']);

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

//delete Food
    Route::delete('foodList/{id}', [FoodsController::class, 'destroy']);

//show Food List
    Route::get('/foodList', [FoodsController::class, 'showFoodsList']);

//update Foods
    Route::get('updateFoods/{id}', [FoodsController::class, 'edit']);
    Route::post('updateFoods/{id}', [FoodsController::class, 'update']);

//restore Foods
    Route::get('/restoreFoods', [FoodsController::class, 'showTrashed']);
    Route::get('restoreFoods/{id}', [FoodsController::class, 'restore']);

//add Showtimes
    Route::get('/addShowtimes', [ShowtimesController::class, 'newShowtimes']);
    Route::get('/addShowtimes', [ShowtimesController::class, 'cinemaOption']);
    Route::post('/addShowtimes/store', [ShowtimesController::class, 'store']);

//delete Showtimes
    Route::delete('showtimesList/{id}', [ShowtimesController::class, 'destroy']);

//show Showtimes List
    Route::get('showtimesList', [ShowtimesController::class, 'showList']);

//restore Showtimes
    Route::get('/restoreShowtimes', [ShowtimesController::class, 'showTrashed']);
    Route::get('restoreShowtimes/{id}', [ShowtimesController::class, 'restore']);

    //Koh Hui Hui
    //Admin-side
    //Membership Promotion
    Route::prefix('promotion')->group(function () {
//        Add Promotion
        Route::get('/add', [MembershipController::class, 'addPromotion']);
        Route::post('/add/store', [MembershipController::class, 'storePromotion']);
//        List Promotion
        Route::get('/list', [MembershipController::class, 'listPromotion']);
//        Delete Promotion
        Route::delete('/list/{id}', [MembershipController::class, 'deletePromotion']);
//        Update Promotion
        Route::get('/update/{id}', [MembershipController::class, 'editPromotion']);
        Route::post('/update/{id}', [MembershipController::class, 'updatePromotion']);
//        Restore Promotion
        Route::get('/restore', [MembershipController::class, 'renewPromotion']);
        Route::get('restore/{id}', [MembershipController::class, 'restorePromotion']);
    });

    //Membership Voucher
    Route::prefix('voucher')->group(function () {
//        Add Voucher
        Route::get('/add', [MembershipController::class, 'addVoucher']);
        Route::post('/add/store', [MembershipController::class, 'storeVoucher']);
//        List Voucher
        Route::get('/list', [MembershipController::class, 'listVoucher']);
//        Delete Voucher
        Route::delete('/list/{id}', [MembershipController::class, 'deleteVoucher']);
//        Update Voucher
        Route::get('/update/{id}', [MembershipController::class, 'editVoucher']);
        Route::post('/update/{id}', [MembershipController::class, 'updateVoucher']);
//        Restore Voucher
        Route::get('/restore', [MembershipController::class, 'renewVoucher']);
        Route::get('restore/{id}', [MembershipController::class, 'restoreVoucher']);
    });

    //Forum
    Route::prefix('forum')->group(function () {
//        Add Forum
        Route::get('/add', [ForumController::class, 'add']);
        Route::post('/add/store', [ForumController::class, 'store']);
//        List Forum
        Route::get('/list', [ForumController::class, 'list']);
//        Delete Forum
        Route::delete('/list/{id}', [ForumController::class, 'delete']);
//        Update Forum
        Route::get('/update/{id}', [ForumController::class, 'edit']);
        Route::post('/update/{id}', [ForumController::class, 'update']);
//        Restore Forum
        Route::get('/restore', [ForumController::class, 'renew']);
        Route::get('restore/{id}', [ForumController::class, 'restore']);
    });
});
