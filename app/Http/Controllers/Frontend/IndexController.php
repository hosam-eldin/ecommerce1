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

    public function productSearch(Request $request)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        //----------------------------------------//
        $search = $request->search;
        $category = $request->category;

        if ($category == 'all') {
            $products = Product::where('product_name_en', 'LIKE', "%$search%")
                ->orWhere('product_name_hin', 'LIKE', "%$search%")
                ->paginate(10);
        } else {
            $products = Product::where('category_id', $category)
                ->where(function ($q) use ($search) {
                    $q->where('product_name_en', 'LIKE', "%$search%")
                        ->orWhere('product_name_hin', 'LIKE', "%$search%");
                })
                ->paginate(10);
        }
        return view('frontend.product.search_result', compact('products', 'categories'));
    } //--------------end method----------------


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
        $product = Product::findOrFail($id);
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->latest()
            ->limit(6)
            ->get();

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);

        $hotDeals = Product::where('hot_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $specialOffers = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $specialDeals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $multiImgs = MultiImgs::where('product_id', $id)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $product = Product::findOrFail($id);

        return view('frontend.product.details', compact(
            'product',
            'categories',
            'multiImgs',
            'featured',
            'hotDeals',
            'specialOffers',
            'specialDeals',
            'product_color_en',
            'product_color_hin',
            'product_size_en',
            'product_size_hin',
            'relatedProducts'
        ));
    } //---------end method------------
    // ---------------------------------------tag-wise-products----------------
    public function tagWiseProduct($tag)
    {

        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        if (session()->get('language') == 'hindi') {
            $products = Product::where('status', 1)
                ->where('product_tags_hin', 'LIKE', "%$tag%")
                ->orderBy('id', 'DESC')
                ->paginate(1);
        } else {
            $products = Product::where('status', 1)
                ->where('product_tags_en', 'LIKE', "%$tag%")
                ->orderBy('id', 'DESC')
                ->paginate(1);
        }
        return view('frontend.tags.tag_products', compact('products', 'categories', 'tag'));
    } //-------------end method-----------------------
    // ---------------------------------------color-wise-products----------------
    public function colorWiseProduct($color_selected)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('product_color_en', $color_selected)
            ->orWhere('product_color_hin', $color_selected)
            ->paginate(1);

        return view('frontend.product.color_view', compact('products', 'color_selected', 'categories'));
    }

    // Subcategory wise data
    public function SubCatWiseProduct($subcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.subcategory_view', compact('products', 'categories'));
    }

    // Subsubcategory wise data
    public function subSubCatWiseProduct($subsubcat_id, $slug)
    {
        $products = Product::where('status', 1)->where('sub_sub_category_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('frontend.product.subsubcategory_view', compact('products', 'categories'));
    } //------------------------------end-Subsubcategory wise data

    ///---------- Product View With Ajax-----------------
    public function ProductViewAjax($id)
    {
        $product = Product::findOrFail($id);

        $categoryName = Category::where('id', $product->category_id)->value('category_name_en');
        $brandName    = Brand::where('id', $product->brand_id)->value('brand_name_en');

        $color = $product->product_color_en;
        $product_color = explode(',', $color);

        $size = $product->product_size_en;
        $product_size = explode(',', $size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
            'category_name_en' => $categoryName,
            'brand_name_en'    => $brandName,

        ));
    } //--------------------------- end method 
}