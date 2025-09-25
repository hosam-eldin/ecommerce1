<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;



//--------------------admin auth route here------------------------
Route::group(['prefix' => 'admin', 'middleware' => ['guest.admin:admin']], function () {
    Route::get('/register', [AdminController::class, 'registerForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.store.register');
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.store.login');
}); //--------------------------------------------------------------------

Route::middleware(['auth.admin:admin', 'verified'])->group(function () {
    //--------------------all admin route here
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
    //------------------------------------product routes end here-----------------------------------
});
//-----------------------------------admin dashboard route here------------------------------
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('/admin/index');
})->name('admin.dashboard');
//--------------------------------------end admin dashboard route-------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {
    //---------------------------all index route here-----------------------------------
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('/user/logout', [IndexController::class, 'logout'])->name('user.logout');
    Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
    Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
    Route::get('/user/change-password', [IndexController::class, 'userChangePassword'])->name('user.change-password');
    Route::post('/user/update-password', [IndexController::class, 'userUpdatePassword'])->name('user.update-password');
    //-----------------------end index all route-----------------------------------
});
//---------------------------------------user dashboard route here--------------------------------------
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
