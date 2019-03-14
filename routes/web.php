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

Route::get('/profile', 'ProfileController@view')->name('profile');

Route::get('/create_bill', 'GstController@create_bill')->name('create_bill');

Route::post('/save_profile', 'ProfileController@save')->name('save_profile');

Route::post('/save_bill', 'GstController@save')->name('save_bill');

Route::get('/view_bill/{id}', 'GstController@view_bill')->name('view_bill');