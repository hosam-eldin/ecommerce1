<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;




Route::group(['prefix' => 'admin', 'middleware' => ['guest.admin:admin']], function () {
    Route::get('/register', [AdminController::class, 'registerForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'register'])->name('admin.store.register');
    Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.store.login');
});
//all admin route here
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile/{id}', [AdminProfileController::class, 'profile'])->name('admin.profile');
Route::get('/admin/profile/edit/{id}', [AdminProfileController::class, 'profileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store/{id}', [AdminProfileController::class, 'profileStore'])->name('admin.profile.store');
Route::get('/admin/change-password/{id}', [AdminProfileController::class, 'changePassword'])->name('admin.change-password');
Route::post('/admin/update-password/{id}', [AdminProfileController::class, 'updatePassword'])->name('admin.update-password');

//end admin all route

//all index route here
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/user/logout', [IndexController::class, 'logout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
Route::get('/user/change-password', [IndexController::class, 'userChangePassword'])->name('user.change-password');
Route::post('/user/update-password', [IndexController::class, 'userUpdatePassword'])->name('user.update-password');
//end index all route
//brand all routes here
Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brands');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::put('/update/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::delete('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
}); //brand routes end here
//Category all routes here
Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.categories');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::put('/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::delete('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
}); //category routes end here


Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('/admin/index');
})->name('admin.dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');