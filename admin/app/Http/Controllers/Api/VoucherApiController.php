<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use \App\Libs\Response as Response;
use App\UserVoucher;
use App\Voucher;
use Illuminate\Support\Facades\Auth;

class VoucherApiController extends Controller
{
    public function __construct()
    {
        $this->response = new Response();
    }

    public function lists(Request $request)
    {
        $vouchers = Voucher::with('merchant')->get();

        return $this->response->success_response('Success get all vouchers', $vouchers, 200);
    }

    public function detail(Request $request, $id)
    {
        $voucher  = Voucher::where(['id' => $id])->with('merchant')->first();

        return $this->response->success_response('Success get detail voucher', $voucher, 200);
    }

    public function take_voucher(Request $request, $id)
    {
        $voucher  = Voucher::where(['id' => $id])->first();

        if (UserVoucher::where(['user_id' => Auth::user()->id, 'voucher_id' => $id])->count() > 0) {
            return $this->response->failed_response('Voucher has been taken', [], 400);
        } else if (Auth::user()->point < $voucher->point_redeem) {
            return $this->response->failed_response('Insufficient user points', [], 400);
        } else if ($voucher->valid_until < date("Y-m-d")) {
            return $this->response->failed_response('Vouchers expired', [], 400);
        }

        $user_voucher = UserVoucher::create([
            'user_id' => Auth::user()->id,
            'voucher_id' => $id,
            'point_redeem' => $voucher->point_redeem,
            'valid_until' => $voucher->valid_until,
        ]);

        return $this->response->success_response('Success take voucher', UserVoucher::where(['id' => $user_voucher->id])->with(['user', 'voucher'])->first(), 200);
    }

    public function use_voucher(Request $request, $id)
    {
        $uv = UserVoucher::where(['id' => $id])->first();
        $voucher  = Voucher::where(['id' => $uv->voucher_id])->first();

        if ($voucher->valid_until < date("Y-m-d")) {
            return $this->response->failed_response('Vouchers expired', [], 400);
        }

        UserVoucher::where(['id' => $uv->id])->update(['used' => true]);

        return $this->response->success_response('Success use voucher', UserVoucher::where(['id' => $uv->id])->with(['user', 'voucher'])->first(), 200);
    }
}
