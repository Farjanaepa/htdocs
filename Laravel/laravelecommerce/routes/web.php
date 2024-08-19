<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/',[HomeController::class,'index'])->name('home.index');


Route::middleware(['auth'])->group(function(){
    Route::get('/account-dashboard',[UserController::class,'account_dashboard'])->name('user.account_dashboard');
});
Route::middleware(['auth',AuthAdmin::class])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});
// Route::post('/logout', [Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/admin/brands',[AdminController::class,'brands'])->name('admin.brands');


Route::get('/admin/brand/add',[AdminController::class,'add_brand'])->name('admin.brand.add');


Route::post('/admin/brand/store',[AdminController::class,'add_brand_store'])->name('admin.brand.store');
