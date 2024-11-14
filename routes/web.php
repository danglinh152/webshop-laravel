<?php

use Illuminate\Support\Facades\Route;

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

//client
Route::get('/login', 'App\Http\Controllers\admin\DashboardController@index');

Route::get('/register', 'App\Http\Controllers\client\HomeController@register');

Route::get('/forgot-password', 'App\Http\Controllers\client\HomeController@forgotPassword');

Route::get('/verify-otp', 'App\Http\Controllers\client\HomeController@otp');

Route::get('/product/{product_id}', 'App\Http\Controllers\client\ItemController@productDetailPage');
Route::get('/product-filter', 'App\Http\Controllers\client\ItemController@productShowPage');

Route::get('/', 'App\Http\Controllers\client\ItemController@getHomePage');

Route::get('/product', 'App\Http\Controllers\client\ItemController@productShowPage');

Route::get('/cart', 'App\Http\Controllers\client\CartController@getCartPage');
Route::get('/checkout', 'App\Http\Controllers\client\CartController@getCheckoutPage');
Route::get('/success', 'App\Http\Controllers\client\CartController@getSuccessPage');

Route::get('/auth/google', 'App\Http\Controllers\GoogleAuthController@redirect');
Route::get('/auth/google/callback', 'App\Http\Controllers\GoogleAuthController@callbackGoogle');

//admin

// Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');
// Route::get('/admin/product', 'App\Http\Controllers\admin\ProductController@showProductPage');
// Route::get('/admin/product/create', 'App\Http\Controllers\admin\ProductController@addProductPage');
// Route::get('/admin/product/details', 'App\Http\Controllers\admin\ProductController@productDetailPage');
// Route::get('/admin/product/update', 'App\Http\Controllers\admin\ProductController@productUpdatePage');
// Route::get('/admin/voucher', 'App\Http\Controllers\admin\VoucherController@getVoucherPage');
// Route::get('/admin/voucher/create', 'App\Http\Controllers\admin\VoucherController@addVoucherPage');
// Route::get('/admin/voucher/update', 'App\Http\Controllers\admin\VoucherController@updateVoucherPage');
// Route::get('/admin/user', 'App\Http\Controllers\admin\UserController@getUserPage');
// Route::get('/admin/user/create', 'App\Http\Controllers\admin\UserController@addUserPage');
// Route::get('/admin/user/update', 'App\Http\Controllers\admin\UserController@updateUserPage');
Route::group(['middleware' => 'admin.auth'], function () {
    // Các route khác có thể thêm vào đây
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');
    Route::get('/admin/product', 'App\Http\Controllers\admin\ProductController@showProductPage');
    Route::get('/admin/product/create', 'App\Http\Controllers\admin\ProductController@addProductPage');
    Route::get('/admin/product/details', 'App\Http\Controllers\admin\ProductController@productDetailPage');
    Route::get('/admin/product/update', 'App\Http\Controllers\admin\ProductController@productUpdatePage');
    Route::get('/admin/voucher', 'App\Http\Controllers\admin\VoucherController@showVoucherPage');
    Route::get('/admin/voucher/create', 'App\Http\Controllers\admin\VoucherController@addVoucherPage');
    Route::get('/admin/voucher/update', 'App\Http\Controllers\admin\VoucherController@updateVoucherPage');
    Route::get('/admin/user', 'App\Http\Controllers\admin\UserController@getUserPage');
    Route::get('/admin/user/create', 'App\Http\Controllers\admin\UserController@addUserPage');
    Route::get('/admin/user/update', 'App\Http\Controllers\admin\UserController@updateUserPage');
    Route::get('/logout', 'App\Http\Controllers\admin\DashboardController@logout');
});

Route::post('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@dashboard');


//admin product
Route::post('/admin/product/save-product', 'App\Http\Controllers\admin\ProductController@save_product');
Route::get('/admin/product/edit-product/{product_id}', 'App\Http\Controllers\admin\ProductController@edit_product');
Route::post('/admin/product/update-product/{product_id}', 'App\Http\Controllers\admin\ProductController@update_product');
Route::get('/admin/product/view-details/{product_id}', 'App\Http\Controllers\admin\ProductController@view_product');
Route::get('/admin/product/delete-product/{product_id}', 'App\Http\Controllers\admin\ProductController@delete_product');
Route::get('/admin/product/active-product/{product_id}', 'App\Http\Controllers\admin\ProductController@active_product');
Route::get('/admin/product/unactive-product/{product_id}', 'App\Http\Controllers\admin\ProductController@unactive_product');

//send mail
Route::post('/send-mail', 'App\Http\Controllers\admin\MailController@sendMail');
Route::post('/check-otp', 'App\Http\Controllers\admin\MailController@verify');
//user
Route::post('/admin/user/add-user', 'App\Http\Controllers\client\UserController@add_user');
Route::post('/login', 'App\Http\Controllers\client\UserController@login');
Route::get('/logout', 'App\Http\Controllers\client\UserController@logout');
Route::post('/admin/user/save-user', 'App\Http\Controllers\admin\UserController@saveUser');
Route::get('/admin/user/edit-user/{user_id}', 'App\Http\Controllers\admin\UserController@updateUserPage');
Route::post('/admin/user/update-user/{user_id}', 'App\Http\Controllers\admin\UserController@update_user');
Route::get('/admin/user/delete-user/{user_id}', 'App\Http\Controllers\admin\UserController@delete_user');

//client add to cart
Route::post('/product/add-to-card/{product_id}', 'App\Http\Controllers\client\CartController@addTocart');

//voucher
Route::post('/admin/voucher/save-voucher', 'App\Http\Controllers\admin\VoucherController@save_voucher');
Route::get('/admin/voucher/edit-voucher/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@edit_voucher');
Route::post('/admin/voucher/update-voucher/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@update_voucher');
Route::get('/admin/voucher/delete-voucher/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@delete_voucher');
