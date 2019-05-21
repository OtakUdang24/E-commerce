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


Route::prefix('admin')->group(function () {
    Route::get('home', function () {
        return view('admin.home', ['currentpage' => 'home']);
    });
    Route::resource('product', 'ProductController');
    Route::resource('user', 'UserController');
    Route::resource('customer', 'CustomerController');
    Route::resource('category', 'CategoryController');
    Route::resource('order', 'OrderController');
});

Auth::routes();
//verifikasi email user
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/account', function (){
    return view('client.register', ['currentpage' => 'register']);
})->name('account');

// Route::get('/home', 'HomeController@index')->name('home');
