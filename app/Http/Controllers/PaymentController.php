<?php

namespace App\Http\Controllers;

/**
 * @author Koh Hui Hui
 */
class PaymentController extends Controller {

    public function form() {
        return view('payment.form');
    }

    public function details() {
        return view('payment.details');
    }

}
