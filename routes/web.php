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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/edit', function() {
    return view('profile.editprofile');
});
Route::get('/user/profile', 'ProfileController@index')->name('profile');

Route::get('/product/create', 'ItemController@create');
Route::post('/product/store', 'ItemController@store');

Route::get('detail/{id}', 'DetailController@index');

Route::post('detail/{id}', 'DetailController@detail');

Route::get('cart', 'DetailController@cart');

Route::post('cart/{id}', 'DetailController@delete');
