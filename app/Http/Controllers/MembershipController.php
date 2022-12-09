<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionRequest;
use App\Http\Requests\VoucherRequest;
use App\Models\Membership;
use App\Models\MembershipVoucher;
use App\Models\Promotion;
use App\Models\Voucher;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use function abort;
use function base_path;
use function redirect;
use function view;

/**
 * @author Koh Hui Hui
 */
class MembershipController extends Controller {

//    Client Side
    public function index() {
        $promotions = Promotion::all();
        return view('membership.promotion', [
            'promotions' => $promotions
        ]);
    }

    public function check() {
        $membershipVouchers = MembershipVoucher::all();
        if ($membershipVouchers->isEmpty()) {
            $membershipVouchers = null;
        }
        $userid = Auth::user()->id;
        $memberships = Membership::where('user_id', $userid);
        return view('membership.check_points', [
            'memVcs' => $membershipVouchers,
            'members' => $memberships
        ]);
    }

    public function voucher() {
        $vouchers = Voucher::all();
        return view('membership.voucher', [
            'vouchers' => $vouchers
        ]);
    }

//    Admin Side - Promotion CRUD
    public function addPromotion() {
        return view('admin.promotion_add');
    }

    public function storePromotion(PromotionRequest $request) {
        $request->validationData();

        $file = $request->promotionImage;

        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(base_path('public\assets\img'), $fileName);

        try {
            Promotion::create([
                'title' => $request->get('promotionTitle'),
                'description' => $request->get('promotionDescription'),
                'image' => $fileName,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'New item has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function listPromotion() {
        $promotions = Promotion::all();
        return view('admin.promotion_list', [
            'promotions' => $promotions
        ]);
    }

    public function deletePromotion($id) {
        try {
            Promotion::find($id)->delete();
            return redirect()->back()->with('success', 'Item has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
        return view('admin.promotion_delete');
    }

    public function editPromotion($id) {
        try {
            $promotion = Promotion::find($id);
            return view('admin.promotion_update', compact('promotion', 'id'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function updatePromotion(Request $request, $id) {
        $promotions = Promotion::find($id);
        $fileName = $promotions->image;

        $this->validate($request, [
            'promotionTitle' => 'required',
            'promotionDescription' => 'required|min:10',
            'promotionImage' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|',
        ]);

        if ($request->hasFile('promotionImage')) {
            $file = $request->get('promotionImage');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(base_path('\public\assets\img'), $fileName);
        }

        $promotions->title = $request->get('promotionTitle');
        $promotions->description = $request->get('promotionDescription');
        $promotions->image = $request->get('promotionImage');
        $promotions->updated_at = Carbon::now()->toDateTimeString();

        $promotions->save();

        return redirect('promotion/list')->with('success', 'Item has been updated.');
    }

    public function renewPromotion() {
        try {
            $promotions = Promotion::onlyTrashed()->get();
            return view('admin.promotion_restore', compact('promotions'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function restorePromotion($id) {
        try {
            Promotion::onlyTrashed()->find($id)->restore();
            return redirect()->back()->with('success', 'Item has been restored.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

//    Admin Side - Voucher CRUD
    public function addVoucher() {
        return view('admin.voucher_add');
    }

    public function storeVoucher(VoucherRequest $request) {
        $request->validationData();

        try {
            Voucher::create([
                'title' => $request->get('voucherTitle'),
                'code' => $request->get('voucherCode'),
                'discount_amount' => $request->get('discountAmount'),
                'exp_date' => $request->get('expirationDate'),
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
            return redirect()->back()->with('success', 'New item has been added.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function listVoucher() {
        $vouchers = Voucher::all();
        return view('admin.voucher_list', [
            'vouchers' => $vouchers
        ]);
    }

    public function deleteVoucher($id) {
        try {
            Voucher::find($id)->delete();
            return redirect()->back()->with('success', 'Item has been deleted.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function editVoucher($id) {
        try {
            $vc = Voucher::find($id);
            return view('admin.voucher_update', compact('vc', 'id'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function updateVoucher(Request $request, $id) {
        $vouchers = Voucher::find($id);

        $this->validate($request, [
            'voucherTitle' => 'required',
            'voucherCode' => 'required|max:10',
            'discountAmount' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'expirationDate' => 'required|date|after:tomorrow',
        ]);

        $vouchers->title = $request->get('voucherTitle');
        $vouchers->code = $request->get('voucherCode');
        $vouchers->discount_amount = $request->get('discountAmount');
        $vouchers->exp_date = $request->get('expirationDate');
        $vouchers->updated_at = Carbon::now()->toDateTimeString();

        $vouchers->save();

        return redirect('voucher/list')->with('success', 'Item has been updated.');
    }

    public function renewVoucher() {
        try {
            $vouchers = Voucher::onlyTrashed()->get();
            return view('admin.voucher_restore', compact('vouchers'));
        } catch (QueryException $e) {
            abort(500);
        }
    }

    public function restoreVoucher($id) {
        try {
            Voucher::onlyTrashed()->find($id)->restore();
            return redirect()->back()->with('success', 'Item has been restored.');
        } catch (QueryException $e) {
            abort(500);
        }
    }

}
