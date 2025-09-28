<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImgs;
use App\Models\Brand;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    use HasProfilePhoto;
    public function index()
    {
        $hotDeals = Product::where('hot_deals', 1)->where('discount_price', '!=', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $specialOffers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->paginate(3);
        $specialDeals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $category_skip_0 = Category::skip(0)->first();
        $products_category_skip_0 = Product::where('category_id', $category_skip_0->id)->orderBy('id', 'DESC')->limit(6)->get();
        $brand_skip_0 = Brand::skip(0)->first();
        $products_brand_skip_0 = Product::where('brand_id', $brand_skip_0->id)->orderBy('id', 'DESC')->limit(6)->get();
        return view('frontend.index', compact('categories', 'category_skip_0', 'products_category_skip_0', 'brand_skip_0', 'products_brand_skip_0', 'sliders', 'products', 'featured', 'hotDeals', 'specialOffers', 'specialDeals'));
    } //end method

    public function logout(Request $request)
    {
        auth()->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect('/login')->with('success', 'User Logout Successfully');
    } //end method

    public function userProfile()
    {
        $user = auth()->user();
        return view('frontend.profile.user_profile', compact('user'));
    } //end method

    public function userProfileStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);


        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        // if ($request->file('profile_photo')) {
        //     $file = $request->file('profile_photo');
        //     @unlink(public_path('upload/user_images/' . $data->profile_photo));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/user_images'), $filename);
        //     $data['profile_photo'] = $filename;
        // }
        if ($request->hasFile('profile_photo_path')) {
            $user->updateProfilePhoto($request->file('profile_photo_path'));
        }
        $user->save();

        return redirect()->route('dashboard')->with('success', 'User Profile Updated Successfully');
    } //end method

    public function userChangePassword()
    {
        $user = auth()->user();
        return view('frontend.profile.change_password', compact('user'));
    } //end method

    public function userUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout')->with('success', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'sorry! Your current password does not match');
        }
    } //end method

    public function productDetails($id)
    {
        $hotDeals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $specialOffers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $specialsDeals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $multiImgs = MultiImgs::where('product_id', $id)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $product = Product::findOrFail($id);
        return view('frontend.product.details', compact('product', 'categories', 'multiImgs', 'featured', 'hotDeals', 'specialOffers', 'specialsDeals'));
    } //---------end method------------
}
