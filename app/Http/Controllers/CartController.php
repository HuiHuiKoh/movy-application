<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Foods;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

    public function cartList() {

//        $userid = Auth::user()->id;
        $userid = 3;
        $foods = DB::table('carts')
                ->join('foods', 'carts.foodID', '=', 'foods.id')
                ->where('carts.userID', $userid)
                ->select('foods.*', 'carts.quantity', 'carts.id as cartID')
                ->get();

        return view('cart', ['foods' => $foods]);
    }

    public function store(Request $request) {

        //$userid = Auth::user()->id;

        try {

            $oldCart = DB::table('carts')
                    ->join('foods', 'foods.id', '=', 'carts.foodID')
                    ->where('carts.userID', 3)
                    ->select('carts.id as cartID', 'foods.id as fID', 'quantity', 'foods.*')
                    ->get();
            foreach ($oldCart as $data) {
                if ($data->fID == $request->foodID) {

                    $update = Cart::where('id', '=', $data->cartID)
                            ->update(['quantity' => $data->quantity + 1]);

                    return redirect()->back()->with('success', 'Item has been added.');
                }
            }

            Cart::create([
                'quantity' => 1,
                'foodID' => $request->get('foodID'),
                'userID' => 3,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

            return redirect()->back()->with('success', 'Item has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function show() {
        return view('cart');
    }

    public function destroy($id) {
        try {
            Cart::find($id)->delete();
            return redirect()->back()->with('success', 'Item has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

}
