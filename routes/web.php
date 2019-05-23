<?php

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
//verifikasi email user
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/account', 'HomeController@register')->name('account');



Route::group(['prefix' => 'admin',  'middleware' => ['auth', 'admin']  ], function()
{
    Route::get('home', function () {
        return view('admin.home', ['currentpage' => 'home']);
    })->name('homeadmin');
    Route::resource('product', 'ProductController');
    Route::get('/max', 'ProductController@autoNumber')->name('max');


    Route::resource('user', 'UserController');
    Route::resource('customer', 'CustomerController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');

});

