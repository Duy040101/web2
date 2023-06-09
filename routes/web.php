<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\TypeaheadController;
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

// FRONTEND
// goi toi file controller roi goi ham index cua HomeCOntroller
Route::get('/',[HomeController::class,'index']);
Route::get('/trangchu',[HomeController::class, 'index']);
Route::post('/timkiem',[HomeController::class, 'tim_kiem']);

//trả về trang tài khoản người dùng
Route::get('/account/{customer_id}',[HomeController::class, 'show_account']);

// Quản lý tài khoản
Route::get('/edit-profile/{customer_id}',[CheckoutController::class,'edit_profile']);
Route::get('/edit-shipping/{customer_id}',[CheckoutController::class,'edit_shipping']);

Route::get('/update-profile-user/{customer_id}',[CheckoutController::class,'update_profile_user']); 
Route::get('/update-shipping-user/{customer_id}',[CheckoutController::class,'update_shipping_user']);


// danh mục sản phẩm của trang chủ
Route::get('/danh-muc-san-pham/{category_id}',[CategoryController::class, 'show_category_home']);

Route::get('/thuonghieu/{brand_id}',[BrandController::class, 'thuonghieu']);
//trang chi tiết sp
Route::get('/chi-tiet-san-pham/{product_id}',[ProductController::class, 'detail_product']);

//BACKEND ->admin

// tra ve trang login
Route::get('/admin',[AdminController::class,'index']);

//tra ve trang dashboard
Route::get('/dashboard',[AdminController::class,'showDashboard']);

// gui thong tin dang nhap de kiem tra tai khoan co trong csdl admin ko
//neu co thi tra ve trang dashboard cua admin , neu khong thi tra ve thong bao loi r quay lai trang dang nhap
Route::post('/admin-dashboard',[AdminController::class,'dashboard']);
Route::get('/logout',[AdminController::class,'logout']);



// Category Product
Route::get('/add-category-product',[CategoryController::class,'add_category_product']);

Route::get('/all-category-product',[CategoryController::class,'all_category_product']);
Route::post('/save-category-product',[CategoryController::class,'save_category_product']);
Route::get('/edit-category-product/{category_id}',[CategoryController::class,'edit_category_product']);
Route::post('/update-category-product/{category_id}',[CategoryController::class,'update_category_product']); 
Route::get('/delete-category-product/{category_id}',[CategoryController::class,'delete_category_product']);

Route::get('/unactive-category-product/{category_id}',[CategoryController::class,'unactive_category_product']);
Route::get('/active-category-product/{category_id}',[CategoryController::class,'active_category_product']);

// Brand Product

Route::get('/add-brand-product',[BrandController::class,'add_brand_product']);

Route::get('/all-brand-product',[BrandController::class,'all_brand_product']);
Route::post('/save-brand-product',[BrandController::class,'save_brand_product']);
Route::get('/edit-brand-product/{brand_id}',[BrandController::class,'edit_brand_product']);
Route::post('/update-brand-product/{brand_id}',[BrandController::class,'update_brand_product']); 
Route::get('/delete-brand-product/{brand_id}',[BrandController::class,'delete_brand_product']);

Route::get('/unactive-brand-product/{brand_id}',[BrandController::class,'unactive_brand_product']);
Route::get('/active-brand-product/{brand_id}',[BrandController::class,'active_brand_product']);

// Product
Route::get('/add-product',[ProductController::class,'add_product']);

Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/tat-ca-sp',[ProductController::class,'tat_ca_sp']);
Route::post('/save-product',[ProductController::class,'save_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::post('/update-product/{product_id}',[ProductController::class,'update_product']); 
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);

Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);

//Cart -> thêm sp vào giỏ hàng
Route::post('/save-cart',[CartController::class,'save_cart']); 
Route::post('/sell-cart',[CartController::class,'sell_cart']); 
Route::get('/show-cart',[CartController::class,'show_cart']); 
Route::get('/delete-cart/{rowId}',[CartController::class,'delete_cart']); 

//Checkout  ktra đăng nhập để thanh tonasthanh toán
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']); 
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']); 
Route::post('/add',[CheckoutController::class,'add_customer']);
 Route::get('/checkout/{customer_id}',[CheckoutController::class,'checkout']); 
 Route::get('/payment/{customer_id}',[CheckoutController::class,'payment']); 
 Route::post('/phuongthucthanhtoan',[CheckoutController::class,'phuongthucthanhtoan']);
 Route::post('/save-checkout-customer',[CheckoutController::class,'save_checkout_customer']);

 Route::post('/login-customer',[CheckoutController::class,'login_customer']);

  Route::post('/update-address/{customer_id}',[CheckoutController::class,'update_address']); 




 // Order đơn hàng
Route::get('/manage-order',[CheckoutController::class,'manage_order']);
Route::get('/view-order/{orderId}',[CheckoutController::class,'view_order']);
Route::post('/capnhatdonhang/{orderId}',[CheckoutController::class,'capnhat']);
Route::get('/timkiem_order',[CheckoutController::class, 'tim_kiem_order']);
Route::get('/delete-order/{order_id}',[CheckoutController::class,'delete_order']);

//thống kê doanh thu

Route::get('/revenue-statistic',[AdminController::class,'thong_ke_doanh_thu']);
Route::get('/timkiem_thong_ke',[AdminController::class, 'tim_kiem_thong_ke']);

//khuyến mãi
Route::get('/all-coupon',[CouponController::class,'all_coupon']);
Route::get('/add-coupon',[CouponController::class,'add_coupon']);
Route::post('/save-coupon',[CouponController::class,'save_coupon']);
Route::get('/edit-coupon/{coupon_id}',[CouponController::class,'edit_coupon']);
Route::post('/update-coupon/{coupon_id}',[CouponController::class,'update_coupon']);
Route::get('/delete-coupon/{coupon_id}',[CouponController::class,'delete_coupon']);
Route::get('/apply-coupon',[CouponController::class,'apply_coupon']);
Route::post('/save-product-coupon',[CouponController::class,'save_coupon_product']);
Route::get('/delete-product-coupon/{product_id}',[CouponController::class,'delete_product_coupon']);
