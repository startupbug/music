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

Route::group(['prefix' => 'admin', 'middleware' => 'is-admin'], function () {
});

Route::group(['prefix' => 'musician', 'middleware' => 'is-musician'], function () {
Route::get('/index','MusicianController@index')->name('main_index');
Route::post('ajaxImageUpload', ['as'=>'musicianImageUpload','uses'=>'MusicianController@musician_image']);
});

Auth::routes();

Route::get('home1', 'HomeController@user_dashboard')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'HomeController@public_index')->name('public_index');




