<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', function () {
    return view('admin.users.login');
});
Route::post('admin/login', [AdminController::class,'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class,'logout'])->name('admin.logout');

//
Route::middleware(['admin'])->group(function () {
    // Admin Management
    Route::get('admin/create', [AdminController::class,'create'])->name('admin.create');
    Route::post('admin/store', [AdminController::class,'store'])->name('admin.store');
    Route::get('admin/show/{id}', [AdminController::class,'show'])->name('admin.show');
    Route::get('admin/edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
    Route::post('admin/change_password/{id}', [AdminController::class,'change_password'])->name('admin.change_password');
    Route::get('admin/lock/{id}', [AdminController::class,'lock'])->name('admin.lock');
    Route::get('admin', [AdminController::class,'index'])->name('admin.index');
    // Product catagories
    Route::get('admin/product_categories', [ProductCategoryController::class,'index'])->name('product_category.index');
    Route::get('admin/product_categories/create', [ProductCategoryController::class,'create'])->name('product_category.create');
    Route::get('admin/product_categories/store', [ProductCategoryController::class,'store'])->name('product_category.store');
    Route::get('admin/product_categories/edit/{id}', [ProductCategoryController::class,'edit'])->name('product_category.edit');
    Route::get('admin/product_categories/update/{id}', [ProductCategoryController::class,'update'])->name('product_category.update');
    Route::get('admin/product_categories/delete/{id}', [ProductCategoryController::class,'delete'])->name('product_category.delete');
    // Brands
    Route::get('admin/brands', [BrandController::class,'index'])->name('brand.index');
    Route::get('admin/brands/create', [BrandController::class,'create'])->name('brand.create');
    Route::post('admin/brands/store', [BrandController::class,'store'])->name('brand.store');
    Route::get('admin/brands/edit/{id}', [BrandController::class,'edit'])->name('brand.edit');
    Route::post('admin/brands/update/{id}', [BrandController::class,'update'])->name('brand.update');
    Route::get('admin/brands/delete/{id}', [BrandController::class,'delete'])->name('brand.delete');
    // Products
    Route::get('admin/products', [ProductController::class,'index'])->name('product.index');
    Route::get('admin/products/create', [ProductController::class,'create'])->name('product.create');
    Route::post('admin/products/store', [ProductController::class,'store'])->name('product.store');
    Route::get('admin/products/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('admin/products/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::get('admin/products/delete/{id}', [ProductController::class,'delete'])->name('product.delete');
    Route::get('admin/products/show/{id}', [ProductController::class,'show'])->name('product.show');
    // Add price
    Route::post('admin/products/price', [ProductController::class,'price'])->name('product.price');

});


