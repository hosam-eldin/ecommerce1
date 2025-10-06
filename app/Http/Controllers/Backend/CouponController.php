<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
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
    // Frontend Coupon Option----------------//

    public function CouponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {
            $total = (float) str_replace(',', '', Cart::total());
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($total * $coupon->coupon_discount / 100),
                'total_amount'    => round($total - $total * $coupon->coupon_discount / 100),
            ]);

            return response()->json(array(

                'success' => 'Coupon Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    } // end method 

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end method 

    // Remove Coupon 
    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }
}
