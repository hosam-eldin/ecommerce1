<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WishList;
use Carbon\Carbon;


class WishListController extends Controller
{
    //
    //wishlist-view
    public function viewWishList()
    {
        return view('frontend.wishlist.my_wishlist');
    } //---------------end-method----------//

    // add to wishlist method 
    public function AddToWishList($product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $product_id)
                ->first();

            if ($exists) {
                return response()->json(['error' => 'Product already in your wishlist']);
            } else {
                Wishlist::create([
                    'user_id'    => Auth::id(),
                    'product_id' => $product_id,
                ]);
                return response()->json(['success' => 'Product added to your wishlist']);
            }
        } else {
            return response()->json(['error' => 'Please login first']);
        }
    } //-----------end-method-----------------------//

    public function GetWishlistProduct()
    {
        $wishlist = WishList::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    } // end method-------------------------// 

    public function RemoveWishlistProduct($id)
    {

        WishList::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }
}