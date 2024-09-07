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

Route::get('/', 'App\Http\Controllers\client\HomeController@index');

Route::get('/home', 'App\Http\Controllers\client\HomeController@index');

Route::get('/admin', 'App\Http\Controllers\admin\AdminController@index');


Route::post('/admin-dashboard', 'App\Http\Controllers\admin\AdminController@dashboard');

Route::get('/logout', 'App\Http\Controllers\admin\AdminController@logout');


Route::get('/dashboard', 'App\Http\Controllers\admin\AdminController@showDashboard')->middleware('admin.auth');
