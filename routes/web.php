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
    return view('index');
});

Route::get('/index', 'HomeController@public_index')->name('public_index');

Route::get('/main_index','HomeController@dashboard')->name('main_index');

Route::get('/contest','PagesController@contest')->name('contest');

Route::get('/winner','PagesController@winner')->name('winner');

Route::get('/musicvoting_genre','PagesController@musicvoting_genre')->name('musicvoting_genre');

Route::get('/artist_detail','PagesController@artist_detail')->name('artist_detail');

Route::get('/musicvoting_search','PagesController@musicvoting_search')->name('musicvoting_search');



Route::group(['prefix' => 'promoter', 'middleware' => 'promoter'], function () {     
    Route::get('/promoterindex','PrmoterController@index')->name('promoterindex');
    Route::get('/promoterdashboard','PrmoterController@dashboard_overview')->name('promoterdashboard');
    Route::get('/musicvoting_tracks','PrmoterController@musicvoting_tracks')->name('promotermusicvoting_tracks');
    Route::get('/redeempoint','PrmoterController@redeempoint')->name('promoterredeempoint');
    Route::get('/setting','PrmoterController@setting')->name('promotersetting');
    Route::get('/promoter_logout', 'PrmoterController@promoter_logout')->name('logout_promoter');
});




Route::group(['prefix' => 'user', 'middleware' => 'is-user'], function () {     
   Route::get('/index','RegisteredController@index')->name('user_index');
   Route::get('/setting','RegisteredController@index')->name('user_setting');
   Route::get('/user_logout', 'RegisteredController@user_logout')->name('logout_user');
});

 



Route::group(['prefix' => 'admin', 'middleware' => 'is-admin'], function () {
});

//Route::get('/promoterindex','PrmoterController@index')->name('promoterindex');

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




