<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use function view;

/**
 * @author Koh Hui Hui
 */
class PaymentController extends Controller {

    public function store(Request $req) {
//        $req->foodTotal;
        $data = $request->session()->all();
        return view('payment.form');
    }

//    
//    public function form() {
//        return view('payment.form');
//    }

    public function details() {
        return view('payment.details');
    }

}
