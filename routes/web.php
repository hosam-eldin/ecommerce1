<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\Shipping\DivisionController;
use App\Http\Controllers\Backend\Shipping\DistrictController;
use App\Http\Controllers\Backend\Shipping\StateController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishListController;
use App\Http\Controllers\User\CartPageController;



//--------------------admin auth route here------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['guest.admin:admin']], function () {
    Route::get('/register', [AdminController::class, 'registerForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.store.register');
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.store.login');
}); //--------------------------------------------------------------------

//--------------------all admin route here---------------------------
Route::middleware(['auth.admin:admin', 'verified'])->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile/{id}', [AdminProfileController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/profile/edit/{id}', [AdminProfileController::class, 'profileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store/{id}', [AdminProfileController::class, 'profileStore'])->name('admin.profile.store');
    Route::get('/admin/change-password/{id}', [AdminProfileController::class, 'changePassword'])->name('admin.change-password');
    Route::post('/admin/update-password/{id}', [AdminProfileController::class, 'updatePassword'])->name('admin.update-password');
    //--------------------------end admin all route-----------------------------------
    //----------------------brand all routes here-------------------------------
    Route::prefix('brand')->group(function () {
        Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brands');
        Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
        Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
        Route::put('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        Route::delete('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
    }); //------------------------------------brand routes end here----
    Route::prefix('slider')->group(function () {
        Route::get('/view', [SliderController::class, 'sliderView'])->name('all.sliders');
        Route::post('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::put('/update/{id}', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::delete('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
        Route::get('/inactive/{id}', [SliderController::class, 'sliderInactive'])->name('slider.inactive');
        Route::get('/active/{id}', [SliderController::class, 'sliderActive'])->name('slider.active');
    }); //------------------------------------brand routes end here----
    //------------------------------------Category all routes here---
    Route::prefix('category')->group(function () {
        Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.categories');
        Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
        //-------------------------------------end category
        //------------------------------------sub category
        Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategories');
        Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
        Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
        Route::put('/sub/update/{id}', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
        Route::delete('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
        //-------------------------------end sub category
        //--------------------------------sub sub category
        Route::get('sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.sub.subcategories');
        Route::post('sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('sub.subcategory.store');
        Route::get('sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('sub.subcategory.edit');
        Route::put('sub/sub/update/{id}', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('sub.subcategory.update');
        Route::delete('sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('sub.subcategory.delete');
        //------//
        Route::get('/get-subcategories/ajax/{category_id}', [SubCategoryController::class, 'getSubCategories']);
        Route::get('/get-sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    }); //-------------------------category routes end here---------------------------------
    //-----------------------------product all routes here---------------------------------------
    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'addProduct'])->name('add.product');
        Route::post('/store', [ProductController::class, 'ProductStore'])->name('product-store');
        Route::get('/all', [ProductController::class, 'ProductsView'])->name('all.products');
        Route::get('edit/{id}', [ProductController::class, 'ProductEdit'])->name('edit.product');
        Route::put('/update/{id}', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
        Route::put('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
        Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailImageUpdate'])->name('update-product-thumbnail');
        Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
        Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
        Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
        Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    });
    //------------------------------------End-product routes end here-----------------------------------
    //------------------------------------ start-coupon routes end here-----------------------------------
    Route::prefix('coupon')->group(function () {
        Route::get('/view', [CouponController::class, 'couponView'])->name('coupon.manage');
        Route::post('/store', [CouponController::class, 'couponStore'])->name('coupon.store');
        Route::get('/edit/{id}', [CouponController::class, 'couponEdit'])->name('coupon.edit');
        Route::put('/update/{id}', [CouponController::class, 'couponUpdate'])->name('coupon.update');
        Route::delete('/delete/{id}', [CouponController::class, 'couponDelete'])->name('coupon.delete');
        // Frontend Coupon Option
        Route::post('/coupon-apply', [CouponController::class, 'CouponApply']);
        Route::get('/coupon-calculation', [CouponController::class, 'CouponCalculation']);
        Route::get('/coupon-remove', [CouponController::class, 'CouponRemove']);


        //------------------------------------ end-coupon routes end here----------------------------
    });
    // ================= SHIPPING ROUTES =================

    // Divisions
    Route::prefix('shipping')->group(function () {
        // Divisions
        Route::get('/divisions', [DivisionController::class, 'index'])->name('division.index');
        Route::post('/divisions/store', [DivisionController::class, 'store'])->name('division.store');
        Route::get('/divisions/edit/{id}', [DivisionController::class, 'edit'])->name('division.edit');
        Route::PUT('/divisions/update/{id}', [DivisionController::class, 'update'])->name('division.update');
        Route::delete('/divisions/delete/{id}', [DivisionController::class, 'destroy'])->name('division.delete');
        // Districts
        Route::get('/districts', [DistrictController::class, 'index'])->name('district.index');
        Route::post('/districts/store', [DistrictController::class, 'store'])->name('district.store');
        Route::get('/districts/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
        Route::PUT('/districts/update/{id}', [DistrictController::class, 'update'])->name('district.update');
        Route::delete('/districts/delete/{id}', [DistrictController::class, 'destroy'])->name('district.delete');
        // States
        Route::get('/states', [StateController::class, 'index'])->name('state.index');
        Route::post('/states/store', [StateController::class, 'store'])->name('state.store');
        Route::get('/states/edit/{id}', [StateController::class, 'edit'])->name('state.edit');
        Route::PUT('/states/update/{id}', [StateController::class, 'update'])->name('state.update');
        Route::delete('/states/delete/{id}', [StateController::class, 'destroy'])->name('state.delete');
        //------//
        Route::get('/get-districts/ajax/{division_id}', [StateController::class, 'getDistricts']);
        Route::get('/get-states/ajax/{district_id}', [StateController::class, 'GetStates']);
    });
});
//--------------------End all admin route here-----------------------------------

//-----------------frontend guest routes-----------------------------
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/lang/hindi', [LanguageController::class, 'hindi'])->name('hindi.language');
Route::get('/lang/english', [LanguageController::class, 'english'])->name('english.language');
Route::get('/search', [IndexController::class, 'productSearch'])->name('product.search');
Route::get('/product/details/{id}', [IndexController::class, 'productDetails'])->name('product.details');
Route::get('/product/tag/{tag}', [IndexController::class, 'tagWiseProduct'])->name('products.tag');
Route::get('/product/color/{color}', [IndexController::class, 'colorWiseProduct']);
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'subSubCatWiseProduct']);
// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
// Add to Cart Store Data
Route::post('/cart/data/store/{id}', [CartController::class, 'addToCart']);
// Add to mini-Cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
// Remove mini cart
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'miniCartRemove']);
//my-cart-view
Route::get('/user/my-cart', [CartPageController::class, 'viewMyCart'])->name('mycart');
//load my-cart products-----
Route::get('/user/get-mycart-product', [CartPageController::class, 'GetMyCartProduct']);
// Remove my-cart
Route::get('/user/mycart-remove/{id}', [CartPageController::class, 'RemoveMyCartProduct']);
//CartIncrement
Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
//CartDecrement
Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);




// ---------------------------all  auth -index- route here-----------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/logout', [IndexController::class, 'logout'])->name('user.logout');
    Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
    Route::get('/user/change-password', [IndexController::class, 'userChangePassword'])->name('user.change-password');
    Route::post('/user/update-password', [IndexController::class, 'userUpdatePassword'])->name('user.update-password');

    // Add to Wishlist
    Route::post('/user/add-to-wishlist/{product_id}', [WishListController::class, 'addToWishList']);
    //wishlist-view
    Route::get('/user/my-wishlist', [WishListController::class, 'viewWishList'])->name('wishlist');
    //load wishlist products-----
    Route::get('/user/get-WishList-product', [WishListController::class, 'GetWishlistProduct']);
    // Remove wishlist
    Route::get('/user/wishlist-remove/{id}', [WishListController::class, 'RemoveWishlistProduct']);

    //-----------------------end- auth- index- all route-----------------------------------
});
//---------------------------------------user dashboard route here--------------------------------------
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//-----------------------------------admin dashboard route here------------------------------
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('/admin/index');
})->name('admin.dashboard');
//--------------------------------------end admin dashboard route-------------------------------------