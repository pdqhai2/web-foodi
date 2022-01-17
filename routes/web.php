<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

// Frontend
    Route::get('/', [HomeController::class, 'index'])->name('fr.homepage');
    Route::get('/contact', [HomeController::class, 'contact'])->name('fr.contact');
    Route::get('/cate-product/{category_id}',[HomeController::class, 'product_by_cate']);

    Route::post('/search-product',[HomeController::class, 'search'])->name('fr.search');
    Route::post('/send-contact',[HomeController::class, 'sendcontact'])->name('fr.sendcontact');
// end Frontend

// User
    Route::get('/user-login',[UserController::class,'login_interface'])->name('us.login');
    Route::get('/user-logout',[UserController::class,'log_out'])->name('us.logout');
    Route::get('/user-profile/{user_usename}',[UserController::class,'view']);
    Route::get('/edit-profile/{user_usename}',[UserController::class,'edit']);
    Route::get('/change-password/{user_usename}',[UserController::class,'changepass']);

    Route::post('/update-pass',[UserController::class,'updatepass'])->name('us.doipass');
    Route::post('/user-profile',[UserController::class,'view_profile'])->name('us.profile'); /* xem thong tin ca nhan */
    Route::post('/user-security',[UserController::class,'user_security'])->name('us.baomat'); /* bao mat tai khoan */
    Route::post('/check-login',[UserController::class,'check_login'])->name('us.checklogin'); /* gui tk mk ve db de check */
    Route::post('/user-new-account',[UserController::class,'new_account']); /* tao tai khoan moi */
    Route::post('/update-profile/{user_usename}',[UserController::class,'update']);
// end User

// Admin
    Route::get('/admin-login', [AdminController::class, 'login'])->name('ad.login');
    Route::get('/admin-new', [AdminController::class, 'adminnew'])->name('ad.new');
    Route::get('/dashboard',[AdminController::class,'show_dashboard'])->name('ad.showdash');
    Route::get('/admin-logout',[AdminController::class,'log_out'])->name('ad.logout');
    Route::get('/admin-browse-cart',[AdminController::class, 'browse_cart'])->name('ad.cart0');
    Route::get('/admin-delivery-cart',[AdminController::class, 'delivery_cart'])->name('ad.cart1');
    Route::get('/admin-delivered-cart',[AdminController::class, 'delivered_cart'])->name('ad.cart2');
    Route::get('/cus-contact',[AdminController::class, 'cuscontact'])->name('ad.cuscontact');

    Route::post('/admin-check',[AdminController::class,'log_in']); /* gui tk mk ve db de check */
    Route::post('/admin-browse-carts',[AdminController::class,'duyet_cart_post'])->name('ad.browsed');
    Route::post('/admin-new-up', [AdminController::class, 'adminnew2'])->name('ad.new2');
// end Admin


// Category
    Route::get('/add-category', [CategoryController::class, 'add'])->name('cate.add');
    Route::get('/view-category', [CategoryController::class, 'view'])->name('cate.view');
    Route::get('/edit-category/{category_id}',[CategoryController::class,'edit']);
    Route::get('/delete-category/{category_id}',[CategoryController::class,'delete']);

    Route::post('/save-category',[CategoryController::class,'save'])->name('cate.save');
    Route::post('/update-category/{category_id}',[CategoryController::class,'update']);
// end Category


// Product
    Route::get('/add-product',[ProductController::class,'add_product'])->name('prod.add');
    Route::get('/view-product',[ProductController::class,'view_product'])->name('prod.view');
    Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
    Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
    Route::get('/view-product/{product_id}',[ProductController::class,'property_product']);

    Route::post('/save-product',[ProductController::class,'save_product'])->name('prod.save');
    Route::post('/update-product/{product_id}',[ProductController::class,'update_product']);
// end Product

// Cart
    Route::get('/my-cart',[CartController::class,'show_cart'])->name('cart.show');
    Route::get('/destroy-cart',[CartController::class,'destroy_cart'])->name('cart.destroy');
    Route::get('/delete-cart-row/{rowId}',[CartController::class,'delete_row']);

    Route::post('/my-cart/add',[CartController::class,'new_cart'])->name('cart.new');
    Route::post('/my-cart/history',[CartController::class,'history_cart'])->name('cart.ls');
    Route::post('/my-cart/history/browse',[CartController::class,'view_dangduyet'])->name('cart.dangduyet');
    Route::post('/my-cart/history/delivery',[CartController::class,'view_danggiao'])->name('cart.danggiao');
    Route::post('/my-cart/history/delivered',[CartController::class,'view_dagiao'])->name('cart.dagiao');
    Route::post('/add-to-cart',[CartController::class,'add_to_cart'])->name('cart.add');
    Route::post('/add-to-cart-2',[CartController::class,'add_to_cart_2'])->name('cart.add2');
    Route::post('/update-cart-row/{rowId}',[CartController::class,'update_cart']);
    Route::post('/my-carts/history',[CartController::class,'nhan_hang'])->name('cart.nhanhang');
// end Cart

// account
    Route::get('/admin-user', [AdminController::class, 'adminaccount'])->name('acc.adm');
    Route::get('/cus-user', [AdminController::class, 'cusaccount'])->name('acc.cus');
// end account