<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;


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

// Route::get('admin/', function () {
//     return view('admin.users.login');
// });
Route::get('admin/', [AdminController::class,'signup'])->name('admin.signup');
Route::post('admin/login', [AdminController::class,'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class,'logout'])->name('admin.logout');

//
Route::middleware(['admin'])->group(function () {
    // Admin Management
    Route::get('admin/user/create', [AdminController::class,'create'])->name('admin.create');
    Route::post('admin/user/store', [AdminController::class,'store'])->name('admin.store');
    Route::get('admin/user/show/{id}', [AdminController::class,'show'])->name('admin.show');
    Route::get('admin/user/edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
    Route::post('admin/user/change_password/{id}', [AdminController::class,'change_password'])->name('admin.change_password');
    Route::get('admin/user/lock/{id}', [AdminController::class,'lock'])->name('admin.lock');
    Route::get('admin/user', [AdminController::class,'index'])->name('admin.index');
    Route::post('admin/checkEmail', [AdminController::class,'checkEmail'])->name('admin.checkEmail');
    Route::post('admin/checkPhone', [AdminController::class,'checkPhone'])->name('admin.checkPhone');
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
    Route::get('admin/products/update_price/{id}', [ProductController::class,'update_price'])->name('product.update_price');
    Route::post('admin/products/store_price/{id}', [ProductController::class,'store_price'])->name('product.store_price');
    //Transaction
    Route::get('admin/transactions/', [TransactionController::class,'index'])->name('transaction.index');
    Route::get('admin/transactions/show/{id}', [TransactionController::class,'show'])->name('transaction.show');
    Route::get('admin/transactions/edit/{id}{key}', [TransactionController::class,'edit'])->name('transaction.edit');
    Route::get('admin/transactions/update/{id}', [TransactionController::class,'update'])->name('transaction.update');
    Route::get('admin/transactions/delete/{id}', [TransactionController::class,'delete'])->name('transaction.delete');
});

// Route::get('lkn',function(){
//     $products=Product::all();
//     foreach($products as $product)
//     {
//         echo $product->name;
//         echo '<br>';
//         foreach($product->size as $size){
//             echo $size->name;
//             echo $size->product_price->price;
//             echo '<br>';
//         }
//         echo '<hr>';
//     }
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class,'index'])->name('guest.index');

Route::post('/getPrice', [PageController::class,'getPrice'])->name('guest.getPrice');
Route::post('/getIdPrice', [PageController::class,'getIdPrice'])->name('guest.getIdPrice');
Route::get('/getCategory/{id}', [PageController::class,'getCategory'])->name('guest.getCategory');
Route::get('/getBrand/{id}', [PageController::class,'getBrand'])->name('guest.getBrand');
Route::get('/search', [PageController::class,'search'])->name('guest.search');
Route::get('/searchPrice', [PageController::class,'searchPrice'])->name('guest.searchPrice');

Route::get('/checkout', [PageController::class,'checkout'])->name('guest.checkout');
Route::get('/checkout/home', [PageController::class,'home'])->name('guest.home');
Route::post('/checkout/store/', [TransactionController::class,'store'])->name('transaction.store');

Route::get('/shop/index', [ShopController::class,'index'])->name('shop.index');
Route::get('/shop/show/{id}', [ShopController::class,'show'])->name('shop.show');
Route::get('/findProduct/{id}', [ShopController::class,'find'])->name('shop.find');

Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::get('/addCart/{id}', [CartController::class,'create'])->name('cart.create');
Route::get('/deleteCart/{id}', [CartController::class,'delete'])->name('cart.delete');
Route::get('/updateItemCart/{id}', [CartController::class,'update'])->name('cart.update');
Route::get('/addToCart', [CartController::class,'add'])->name('cart.add');
Route::get('/showCart', [CartController::class,'show'])->name('cart.show');

