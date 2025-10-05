<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function couponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupons.Coupon_view', compact('coupons'));
    }

    public function couponStore(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);

        Coupon::create([
            'coupon_name'  => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' =>  $request->coupon_validity,
            'created_at' => Carbon::now(),

        ]);

        return redirect()->route('coupon.manage')->with('success', 'Coupon Inserted successfully.');
    }

    public function couponEdit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.Coupons.Coupon_edit', compact('coupon'));
    }

    public function CouponUpdate(Request $request, $id)
    {


        $Coupon = Coupon::findOrFail($id);
        $Coupon->update([
            'coupon_name'  => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' =>  $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('coupon.manage')->with('success', 'Coupon updated successfully.');
    }

    public function couponDelete($id)
    {
        $Coupon = Coupon::findOrFail($id);
        $Coupon->delete();

        return redirect()->route('coupon.manage')->with('success', 'Coupon deleted successfully.');
    }
}
