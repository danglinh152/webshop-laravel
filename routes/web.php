<?php

use App\Http\Controllers\client\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\UserController;

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
// Route::get('/checkout', 'App\Http\Controllers\client\CartController@getCheckoutPage');

// Route::get('/success?partnerCode=MOMOBKUN20180529&orderId=1732804656&requestId=1732804656&amount=10000&orderInfo=Thanh+to%C3%A1n+qua+MoMo&orderType=momo_wallet&transId=4248103194&resultCode=1002&message=Transaction+rejected+by+the+issuers+of+the+payment+accounts.&payType=napas&responseTime=1732804678758&extraData=&signature=e442b5c2e45717740f64b8ebc21a58eb101ae3cd62fb75571f0914071c37b6c9', 'App\Http\Controllers\client\CartController@getSuccessPage');
// Route::get('/success', 'App\Http\Controllers\client\CartController@getSuccessPage');
Route::get('/success', 'App\Http\Controllers\client\CartController@getSuccessPage');
Route::get('/error', 'App\Http\Controllers\client\CartController@getErrorPage');
Route::get('/contact', 'App\Http\Controllers\client\HomeController@getContactPage');
Route::get('/client/information', 'App\Http\Controllers\client\HomeController@getInforPage');
Route::post('/client/update-user', 'App\Http\Controllers\client\UserController@updateUser');
Route::post('/client/update-password', 'App\Http\Controllers\client\UserController@updatePassword');
Route::post('/client/update-password', [UserController::class, 'updatePassword']);

Route::get('/order-history', 'App\Http\Controllers\client\OrderController@getOrderHistoryPage');
Route::post('/order/cancel/{order_id}', 'App\Http\Controllers\client\OrderController@CancelOrder');

Route::get('/auth/google', 'App\Http\Controllers\GoogleAuthController@redirect');
Route::get('/auth/google/callback', 'App\Http\Controllers\GoogleAuthController@callbackGoogle');


Route::get('/auth/facebook', 'App\Http\Controllers\FacebookAuthController@redirect');
Route::get('/auth/facebook/callback', 'App\Http\Controllers\FacebookAuthController@callbackFacebook');

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
    Route::post('/admin/update-info', 'App\Http\Controllers\admin\DashboardController@updateInfo');
    Route::post('/admin/update-password', 'App\Http\Controllers\admin\DashboardController@updatePassword');
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
    Route::get('/admin/order', 'App\Http\Controllers\admin\OrderController@getOrderPage');
    Route::get('/admin/order/update/{order_id}', 'App\Http\Controllers\admin\OrderController@getUpdateOrderPage');
    Route::post('/admin/order/update-order/{order_id}', 'App\Http\Controllers\admin\OrderController@update_order');
    Route::get('/admin/order/delete/{order_id}', 'App\Http\Controllers\admin\OrderController@delete_order');
    Route::get('/admin/logout', 'App\Http\Controllers\admin\DashboardController@logout');
    Route::get('/admin/information', 'App\Http\Controllers\admin\DashboardController@getInfoPage');

    Route::post('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@dashboard');

    //admin product
    Route::post('/admin/product/save-product', 'App\Http\Controllers\admin\ProductController@save_product');
    Route::get('/admin/product/edit-product/{product_id}', 'App\Http\Controllers\admin\ProductController@edit_product');
    Route::post('/admin/product/update-product/{product_id}', 'App\Http\Controllers\admin\ProductController@update_product');
    Route::get('/admin/product/view-details/{product_id}', 'App\Http\Controllers\admin\ProductController@view_product');
    Route::get('/admin/product/delete-product/{product_id}', 'App\Http\Controllers\admin\ProductController@delete_product');
    Route::get('/admin/product/active-product/{product_id}', 'App\Http\Controllers\admin\ProductController@active_product');
    Route::get('/admin/product/unactive-product/{product_id}', 'App\Http\Controllers\admin\ProductController@unactive_product');
    Route::post('/admin/user/add-user', 'App\Http\Controllers\client\UserController@add_user');

    Route::post('/admin/user/save-user', 'App\Http\Controllers\admin\UserController@saveUser');
    Route::get('/admin/user/edit-user/{user_id}', 'App\Http\Controllers\admin\UserController@updateUserPage');
    Route::post('/admin/user/update-user/{user_id}', 'App\Http\Controllers\admin\UserController@update_user');
    Route::get('/admin/user/delete-user/{user_id}', 'App\Http\Controllers\admin\UserController@delete_user');


    //voucher
    Route::post('/admin/voucher/save-voucher', 'App\Http\Controllers\admin\VoucherController@save_voucher');
    Route::get('/admin/voucher/edit-voucher/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@edit_voucher');
    Route::post('/admin/voucher/update-voucher/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@update_voucher');
    Route::get('/admin/voucher/delete-voucher/{voucher_id}', 'App\Http\Controllers\admin\VoucherController@delete_voucher');
});


//client product
Route::post('/client/review/addComment', 'App\Http\Controllers\client\ReviewController@post_review');

//send mail
Route::post('/send-mail', 'App\Http\Controllers\admin\MailController@sendMail');
Route::post('/check-otp', 'App\Http\Controllers\admin\MailController@verify');
//user

Route::post('/auth', 'App\Http\Controllers\client\UserController@login');
Route::get('/logout', 'App\Http\Controllers\client\UserController@logout');

//client add to cart
Route::post('/product/add-to-card/{product_id}', 'App\Http\Controllers\client\CartController@addTocart');
Route::post('/product/add-to-cart/{product_id}/{quantityParam}', 'App\Http\Controllers\client\CartController@addToCartInDetail');
Route::post('/product/delete-product-from-cart/{product_id}', 'App\Http\Controllers\client\CartController@deleteCart');


//checkout
Route::post('/client/checkout', 'App\Http\Controllers\client\CartController@getCheckoutPage');
Route::post('/client/online-checkout', 'App\Http\Controllers\client\OnlineCheckoutController@online_checkout');
Route::post('/client/confirm-checkout', 'App\Http\Controllers\client\OnlineCheckoutController@confirm_checkout');


Route::post('/cart/increment-quantity', 'App\Http\Controllers\client\CartController@incrementQuantity');
Route::post('/cart/decrement-quantity', 'App\Http\Controllers\client\CartController@decrementQuantity');
