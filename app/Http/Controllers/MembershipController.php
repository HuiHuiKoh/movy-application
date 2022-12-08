<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use function view;

/**
 * @author Koh Hui Hui
 */
class MembershipController extends Controller {

    public function index() {
        return view('membership.promotion');
    }

    public function check() {
        return view('membership.check_points');
    }

    public function voucher() {
        return view('membership.voucher');
    }

    public function addPromotion() {
        return view('admin.promotion.add');
    }

    public function listPromotion() {
        return view('admin.promotion.list',[
        ]);
    }

    public function deletePromotion() {
        return view('admin.promotion.delete');
    }

    public function updatePromotion() {
        return view('admin.promotion.update');
    }

    public function addVoucher() {
        return view('admin.voucher.add');
    }

    public function listVoucher() {
        return view('admin.voucher.list');
    }

    public function deleteVoucher() {
        return view('admin.voucher.delete');
    }

    public function updateVoucher() {
        return view('admin.voucher.update');
    }

}
