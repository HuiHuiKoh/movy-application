<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(){
        
        return view('login');
    }
    
    public function registration(){
        return view('registration');
    }
    
    public function logout(){
        
    }
}
