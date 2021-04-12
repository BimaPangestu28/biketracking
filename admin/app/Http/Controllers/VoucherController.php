<?php

namespace App\Http\Controllers;

use App\Merchant;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::all();

        return view('pages.vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merchants = Merchant::all();

        return view('pages.vouchers.create', compact('merchants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'mimes:jpeg,png|max:1014',
        ]);

        $extension = $request->image->extension();
        $image_name = Str::slug($request->name) . '.' . $extension;
        $public_path = '/images/merchants/vouchers/';

        $request->image->move(public_path($public_path), $image_name);

        Voucher::create([
            "merchant_id" => $request->merchant_id,
            "name" => $request->name,
            "point_redeem" => $request->point_redeem,
            "valid_until" => $request->valid_until,
            "image" => $public_path . $image_name
        ]);

        return redirect()->route('vouchers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher, $id)
    {
        Voucher::where(['id' => $id])->delete();

        return redirect()->route('vouchers.index');
    }
}
