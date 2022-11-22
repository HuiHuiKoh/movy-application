<?php

namespace App\Http\Controllers;

use function view;

/**
 * @author Koh Hui Hui
 */
class MembershipController extends Controller {

    public function index() {
        return view('membership.promotion');
    }

    public function check() {
        return view('membership.checkPoints');
    }

    public function voucher() {
        return view('membership.voucher');
    }

}
