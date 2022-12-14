<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FoodRequest;
use App\Models\Foods;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function abort;
use function redirect;
use function view;

class FoodsController extends Controller {

    public function showFoods(Request $request) {

//        store session seat quantity
        Session::put('twinQty', $request->qtyTwin);
        Session::put('classicQty', $request->qtyClassic);
//        store session seat order
        Session::put('twinSeat', $request->twinSeat);
        Session::put('classicSeat', $request->classicSeat);

        $foods = Foods::all();
        return view('f&b', ['foods' => $foods]);
    }

    public function foodInfo($id) {

        $foods = Foods::find($id);
        return view('food', compact('foods', 'id'));
    }

    public function newFoods() {
        return view('admin.addFood');
    }

    public function showFoodsList() {

        try {
            $foods = Foods::all();
//            return json_decode($books);
            return view('admin.foodList', compact('foods'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function destroy($id) {
        try {
            Foods::find($id)->delete();
            return redirect()->back()->with('success', 'Item has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function store(FoodRequest $request) {

        $request->validationData();

        $file = $request->image;

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(base_path('public\assets\img'), $fileName);

        try {
            Foods::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'image' => $fileName,
                'price' => $request->get('price'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'New Item has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function edit($id) {
        try {
            $foods = Foods::find($id);
            return view('admin.updateFood', compact('foods', 'id'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function update(Request $request, $id) {

        $foods = Foods::find($id);

        $fileName = $foods->image;

        $this->validate($request, [
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'name' => 'required|string|max:250',
            'description' => 'required',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(base_path('public\assets\img'), $fileName);
        }

        $foods->name = $request->get('name');
        $foods->price = $request->get('price');
        $foods->description = $request->get('description');
        $foods->updated_at = Carbon::now()->toDateTimeString();
        $foods->image = $fileName;

        $foods->save();

        return redirect()->back()->with('success', 'Item has been updated.');
    }

    public function showTrashed() {
        try {
            $foods = Foods::onlyTrashed()->get();
            return view('admin.restoreFoods', compact('foods'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function restore($id) {
        try {
            Foods::onlyTrashed()->find($id)->restore();
            return redirect()->back()->with('success', 'Item has been restored.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

}
