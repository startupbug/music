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
    return view('home.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contest','HomeController@contest')->name('contest');

Route::get('/winner','HomeController@winner')->name('winner');

Route::get('/musicvoting_genre','HomeController@musicvoting_genre')->name('musicvoting_genre');
