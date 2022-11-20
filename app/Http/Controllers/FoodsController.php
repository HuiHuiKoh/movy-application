<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foods;

class FoodsController extends Controller
{
    public function showFoods() {
        $foods = Foods::all();
        return view('f&b', ['foods' => $foods]);
    }
    
    public function foodInfo($id){  
        
        $foods = Foods::find($id);      
        return view('food',compact('foods','id'));            
    }
    
}
