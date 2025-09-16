<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;




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





//end index all route
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('/admin/index');
})->name('admin.dashboard');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
