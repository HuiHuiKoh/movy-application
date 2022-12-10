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
use Illuminate\Support\Facades\DB;
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
        $members = DB::table('memberships')
                ->where('memberships.user_id', $userid)
                ->select('memberships.*', 'memberships.id as memberId')
                ->get();
        return view('membership.check_points', [
            'memVcs' => $membershipVouchers,
            'members' => $members
        ]);
    }

    public function voucher() {
        $vouchers = Voucher::all();
        $membershipVouchers = MembershipVoucher::all();
        if ($membershipVouchers->isEmpty()) {
            $membershipVouchers = null;
        }
        $foundVc = array();
        foreach ($membershipVouchers as $membershipVoucher) {
            if (Voucher::where('code', '=', $membershipVoucher->code)->exists()) {
                array_push($foundVc, $membershipVoucher->code);
            }
        }
        return view('membership.voucher', [
            'vouchers' => $vouchers,
            'memVcs' => $membershipVouchers,
            'found' => $foundVc,
        ]);
    }
//
//    public function apply(Request $request) {
//        $inputCode = $request->apply;
//        if (MembershipVoucher::where('code', '=', $inputCode)->exists()) {
//            $membershipVouchers = MembershipVoucher::all();
//            foreach ($membershipVouchers as $membershipVoucher) {
//                $membershipVouchers = DB::table('membership_vouchers')
//                        ->where('membership_vouchers.user_id', $userid)
//                        ->select('membership_vouchers.*', 'membership_vouchers.id as memberId')
//                        ->join('membership_vouchers', 'memberships.code')
//                        ->get();
//            }
//        }
//    }

    public function collect($id) {
        $vouchers = Voucher::find($id);
        $userid = Auth::user()->id;
        $membership = Membership::where('user_id', $userid)->first();

        MembershipVoucher::create([
            'title' => $vouchers->title,
            'code' => $vouchers->code,
            'redemption_date' => null,
            'member_id' => $membership->id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect()->back()->with('success', 'Voucher is collected successfully');
    }

    public function points(Request $request) {
        $points = $request->pointDc;
        $change = $_POST['pointDc'] ?? 0;
        $userid = Auth::user()->id;
        $membership = Membership::where('user_id', $userid)->first();
        if (isset($_POST['btnSubmit'])) {
            if ($change > 0) {
                $dcVal = $change * 100;
                $oldPoints = $membership->points;
                $amt = $oldPoints - $dcVal;
                if ($amt > 0) {


                    echo '<script>console.log(' . $dcVal . ')</script>';

                    $newPoints = $oldPoints - $dcVal;

                    $membership->points = $newPoints;
                    $membership->user_id = $userid;
                    $membership->updated_at = Carbon::now()->toDateTimeString();

                    echo '<script>console.log(' . $newPoints . ')</script>';
                    $membership->save();

                    for ($i = 0;
                            $i < $points;
                            $i++) {
                        MembershipVoucher::create([
                            'title' => "Exchange voucher on member points accumulated",
                            'code' => "VC05",
                            'redemption_date' => null,
                            'member_id' => $membership->id,
                            'created_at' => Carbon::now()->toDateTimeString(),
                        ]);
                    }

                    return redirect()->back()->with('success', 'Voucher exchanged successfully');
                } else {
                    return redirect()->back()->with('error', 'Please insert a valid amount');
                }
            }
        } else {
            return redirect()->back();
        }
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
            'promotionImage' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|',
        ]);

        if ($request->hasFile('promotionImage')) {
            $file = $request->promotionImage;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(base_path('\public\assets\img'), $fileName);
        }

        $promotions->title = $request->get('promotionTitle');
        $promotions->description = $request->get('promotionDescription');
        $promotions->updated_at = Carbon::now()->toDateTimeString();
        $promotions->image = $fileName;

        $promotions->save();

        return redirect()->back()->with('success', 'Item has been updated.');
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

        return redirect()->back()->with('success', 'Item has been updated.');
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

    public function collectVoucher($id) {
        $vouchers = Voucher::where('id', $id);

        try {
            MembershipVoucher::create([
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

}
