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

class UserController extends Controller {

    public function show() {

        return view('login');
    }

    public function viewDash() {

        return view('admin.adminDashboard');
    }

    public function registration() {

        return view('auth.registration');
    }

    public function validate_registration(UserRequest $request) {

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

    public function validate_login(Request $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 1) {

                return redirect('/dashboard')->with('success', 'Welcome to Admin Dashboard');
                
            } else if (Auth::user()->role == 0) {

                return redirect('home')->with('success', 'Logged In Successful');
            }
        }else{
            return redirect('login')->with('success', 'Email or password are invalid');
        }



        
    }

    public function homepage() {
        if (Auth::check()) {
            return view('homepage');
        }

        return redirect('login')->with('success', 'You are not allowed to access');
    }

    public function logout() {

        Session::flush();
        Auth::logout();
        return redirect('login');
    }

}
