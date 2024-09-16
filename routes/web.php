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
Route::get('/', 'App\Http\Controllers\client\HomeController@index');

Route::get('/register', 'App\Http\Controllers\client\HomeController@register');

Route::get('/forgot-password', 'App\Http\Controllers\client\HomeController@forgotPassword');

Route::get('/verify-otp', 'App\Http\Controllers\client\HomeController@otp');

Route::get('/product/id', 'App\Http\Controllers\client\ItemController@productDetailPage');

Route::get('/product', 'App\Http\Controllers\client\ItemController@productShowPage');




//admin
Route::get('/login', 'App\Http\Controllers\admin\DashboardController@index');
Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');
Route::get('/admin/product', 'App\Http\Controllers\admin\ProductController@showProductPage');
Route::get('/admin/product/create', 'App\Http\Controllers\admin\ProductController@addProductPage');
Route::get('/admin/product/details', 'App\Http\Controllers\admin\ProductController@productDetailPage');
Route::get('/admin/product/update', 'App\Http\Controllers\admin\ProductController@productUpdatePage');
Route::group(['middleware' => 'admin.auth'], function () {
    // Các route khác có thể thêm vào đây
    // Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');

    // Route::get('/logout', 'App\Http\Controllers\admin\DashboardController@logout');
});

Route::post('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@dashboard');


//product
Route::post('/admin/product/save-product', 'App\Http\Controllers\admin\ProductController@save_product');
