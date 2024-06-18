<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[MyHomeController::class, 'homepage']);
Route::get('/logins',[HomeController::class, 'index']);
Route::get('/shop',[MyHomeController::class, 'shop']);
Route::get('/blog',[MyHomeController::class, 'blog']);
Route::get('/track',[MyHomeController::class, 'track']);
Route::get('/contact',[MyHomeController::class, 'contact']);

//Banner Controller
Route::get('/admins', [AdminController::class, 'index'])->middleware('is_admin');
Route::get('/admins/banner', [BannerController::class, 'listAll'])->middleware('is_admin')->name('admin.banner');
Auth::routes();
Route::get('/admins/banner/endisble/{id}/{action}', [BannerController::class, 'enableDisable'])->name('admin.banner.enbledisable');
Route::get('/admins/banner/moveupdown/{id}/{action}', [BannerController::class, 'moveUpdown'])->name('admin.banner.moveupdown');
Route::get('/admins/banner/delete/{id}', [BannerController::class, 'Delete'])->name('admin.banner.delete');
Route::get('/admins/banner/form', [BannerController::class, 'form'])->name('admin.banner.form');
Route::post('/admins/banner/add', [BannerController::class, 'add'])->name('admin.banner.add');
Route::get('/admins/banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
Route::post('/admins/banner/update', [BannerController::class, 'update'])->name('admin.banner.update');
Route::get('/product_details/{id}',[MyHomeController::class, 'product_details']);
Route::get('/cart',[MyHomeController::class, 'cart'])->name('cart');
Route::post('/cart',[MyHomeController::class, 'addcart'])->name('cart.store');
Route::post('remove', [MyHomeController::class, 'removeCart'])->name('cart.remove');
Route::get('/add_cart/{id}',[MyHomeController::class, 'add_cart'])->middleware(['auth','verified']);
Route::get('/mycart',[MyHomeController::class, 'mycart'])->middleware(['auth','verified']);
//Route::get('/home', [HomeController::class, 'index'])->name('home')
//Product 
Route::get('/admins/product', [ProductController::class, 'Listall'])->middleware('is_admin')->name('admin.product');
Route::get('/admins/product/endisble/{id}/{action}', [ProductController::class, 'enableDisable'])->name('admin.product.enbledisable');
Route::get('/admins/product/moveupdown/{id}/{action}', [ProductController::class, 'moveUpdown'])->name('admin.product.moveupdown');
Route::get('/admins/product/delete/{id}', [ProductController::class, 'Delete'])->name('admin.product.delete');
Route::get('/admins/product/form', [ProductController::class, 'form'])->name('admin.product.form');
Route::post('/admins/product/add', [ProductController::class, 'add'])->name('admin.product.add');
Route::get('/admins/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('/admins/product/update', [ProductController::class, 'update'])->name('admin.product.update');

//Category Controller
Route::get('/admins/category', [CategoryController::class, 'ListAll'])->middleware('is_admin')->name('admin.category');
Route::get('/admins/category/endisble/{id}/{action}', [CategoryController::class, 'enableDisable'])->name('admin.category.enbledisable');
Route::get('/admins/category/moveupdown/{id}/{action}', [CategoryController::class, 'moveUpdown'])->name('admin.category.moveupdown');
Route::get('/admins/category/delete/{id}', [CategoryController::class, 'Delete'])->name('admin.category.delete');
Route::get('/admins/category/form', [CategoryController::class, 'form'])->name('admin.category.form');
Route::post('/admins/category/add', [CategoryController::class, 'add'])->name('admin.category.add');
Route::get('/admins/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admins/category/update', [CategoryController::class, 'update'])->name('admin.category.update');
//Orders
Route::get('/admins/order', [OrderController::class, 'Order'])->name('admin.order');
Route::get('/admins/order/delete/{id}', [OrderController::class, 'Delete'])->name('admin.order.delete');


//Order Detail

//User Controller
Route::get('/admins/user', [UsersController::class, 'userListAll'])->middleware('is_admin')->name('admin.user');
Route::get('/admins/user/endisble/{id}/{action}', [UsersController::class, 'enableDisable'])->name('admin.user.enbledisable');
Route::get('/admins/user/delete/{id}', [UsersController::class, 'Delete'])->name('admin.user.delete');
Route::get('/admins/user/form', [UsersController::class, 'form'])->name('admin.user.form');
Route::post('/admins/user/add', [UsersController::class, 'add'])->name('admin.user.add');
Route::get('/admins/user/edit/{id}', [UsersController::class, 'edit'])->name('admin.user.edit');
Route::post('/admins/user/update', [UsersController::class, 'update'])->name('admin.user.update');