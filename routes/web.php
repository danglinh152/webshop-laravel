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

Route::get('/home-page', 'App\Http\Controllers\client\HomeController@index');

Route::get('/register', 'App\Http\Controllers\client\HomeController@register');





//admin
Route::get('/login', 'App\Http\Controllers\admin\DashboardController@index');


Route::group(['middleware' => 'admin.auth'], function () {
    // Các route khác có thể thêm vào đây
    Route::get('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@showDashboard');

    Route::get('/logout', 'App\Http\Controllers\admin\DashboardController@logout');
});

Route::post('/admin/dashboard', 'App\Http\Controllers\admin\DashboardController@dashboard');
