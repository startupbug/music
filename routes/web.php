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

Route::get('/index','Musician\MusicianController@index')->name('main_index');

Route::get('/overview','Musician\MusicianController@overview')->name('musician_overview');

Route::get('/track','Musician\TracksController@index')->name('musician_track');
Route::get('/create_track','Musician\TracksController@create')->name('create_track');

Route::get('/album','Musician\AlbumsController@index')->name('musician_album');
Route::get('/create_album','Musician\AlbumsController@create')->name('create_album');

Route::get('/setting','Musician\MusicianController@setting')->name('musician_setting');

Route::post('ajaxImageUpload', ['as'=>'musicianImageUpload','uses'=>'Musician\MusicianController@musician_image']);

Route::get('/musician_logout', 'Musician\MusicianController@musician_logout')->name('logout_musician');

});

Auth::routes();

Route::get('home1', 'HomeController@user_dashboard')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'HomeController@public_index')->name('public_index');




