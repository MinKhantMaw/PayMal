<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/','Frontend\PageController@index')->name('home');

Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login');
Route::post('/admin/logout','Auth\AdminLoginController@logout')->name('admin.logout');

