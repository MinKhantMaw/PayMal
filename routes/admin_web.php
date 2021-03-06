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


// route group
Route::prefix('admin')->namespace('Backend')->name('admin.')->middleware('auth:admin_user')->group(function(){
   Route::get('/','PageController@index')->name('home');

   Route::resource('admin-user', AdminUserController::class);

   Route::get('admin-user/datatable/ssd','AdminUserController@ssd');
});

