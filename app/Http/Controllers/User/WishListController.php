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
        return view('frontend.my_wishlist');
    } //---------------end-method----------//

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
