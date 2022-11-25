<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;

class UserController extends Controller
{
    public function show(){
        
        return view('login');
    }
    
    public function registration(){
        
        return view('registration');
    }
    
    public function validate_registration(UserRequest $request){
        
        $request->validationData();
        
        try {
            User::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'password' => Hash::make($request->get('password')),
                'birth' => $request->get('birth'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect('login')->with('success', 'Registration Completed, now you can login.');
        } catch (QueryException $e) {
            abort(500);
        }
        
    }
    
    public function logout(){
        
    }
    
}
