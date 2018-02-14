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
Route::post('ajaxImageUpload',['as'=>'promoterImageUpload','uses'=>'PrmoterController@promoter_image']);   
    Route::get('/promoterindex','PrmoterController@index')->name('promoterindex');
    Route::get('/promoterdashboard','PrmoterController@dashboard_overview')->name('promoterdashboard');
    Route::get('/musicvoting_tracks','PrmoterController@musicvoting_tracks')->name('promotermusicvoting_tracks');
    Route::get('/redeempoint','PrmoterController@redeempoint')->name('promoterredeempoint');
    Route::get('/setting','PrmoterController@setting')->name('promotersetting');
    Route::get('/edit/{id}','PrmoterController@edit')->name('editpromoter');
    Route::post('/update_account/{id}','PrmoterController@update_account')->name('promoter_update_account');
    Route::get('/edit_links/{id}','PrmoterController@edit_links')->name('promoter_edit_links');
    Route::post('/update_links/{id}','PrmoterController@update_links')->name('promoter_update_links');
    Route::post('/update_password/{id}','PrmoterController@promoter_update_password')->name('promoter_update_password');
    Route::get('/tracks_assign','PrmoterController@promoter_track_assign')->name('promoter_track_assign');
    Route::get('/approve_status/{id}/', ["as" => "approve-status", "uses" => "PrmoterController@approve_status"]);
    Route::get('/disapprove_status/{id}/', ["as" => "disapprove-status", "uses" => "PrmoterController@disapprove_status"]);
    Route::get('/promoter_logout', 'PrmoterController@promoter_logout')->name('logout_promoter');
});
Route::group(['prefix' => 'user', 'middleware' => 'is-user'], function () {     
   Route::get('/index','RegisteredController@index')->name('user_index');
   Route::get('/setting','RegisteredController@setting')->name('user_setting');
   Route::get('/edit/{id}','RegisteredController@edit')->name('edituser');
   Route::post('/update_account/{id}','RegisteredController@update_account')->name('user_update_account');
   Route::get('/edit_links/{id}','RegisteredController@edit_links')->name('user_edit_links');
   Route::post('/update_links/{id}','RegisteredController@update_links')->name('user_update_links');
   Route::get('album_videos/{id}','RegisteredController@album_videos')->name('user_album_videos');
   Route::get('/user_logout', 'RegisteredController@user_logout')->name('logout_user');
});

 



Route::group(['prefix' => 'admin', 'middleware' => 'is-admin'], function () {
});

//Route::get('/promoterindex','PrmoterController@index')->name('promoterindex');

Route::group(['prefix' => 'musician', 'middleware' => 'is-musician'], function () {

Route::get('/index','Musician\MusicianController@index')->name('main_index');

Route::post('ajaxImageUpload',['as'=>'musicianImageUpload','uses'=>'Musician\MusicianController@musician_image']);

Route::get('/overview','Musician\MusicianController@overview')->name('musician_overview');

Route::get('/track','Musician\TracksController@index')->name('musician_track');
Route::get('/edit_track/{id}/','Musician\TracksController@edit')->name('edit_track');
Route::post('/update_track/{id}/','Musician\TracksController@update_track')->name('update_track');
Route::post('/assign_promoter/','Musician\TracksController@assignPrommoter')->name('assign_promoter');
Route::get('/delete_track/{id}/','Musician\TracksController@destroy')->name('delete_track');
Route::get('/create_track','Musician\TracksController@create')->name('create_track');
Route::post('/upload_track','Musician\TracksController@store')->name('upload_track');

Route::get('/album','Musician\AlbumsController@index')->name('musician_album');
Route::get('/edit_album/{id}','Musician\AlbumsController@edit')->name('edit_album');
Route::post('/update_album/{id}/','Musician\AlbumsController@update_album')->name('update_album');
Route::post('/add_video','Musician\AlbumsController@add_video')->name('add_video');
Route::get('/delete_album/{id}/','Musician\AlbumsController@destroy')->name('delete_album');
Route::get('/create_album','Musician\AlbumsController@create')->name('create_album');
Route::post('/upload_album','Musician\AlbumsController@store')->name('upload_album');

Route::post('/upload_video','Musician\AlbumsController@upload_video')->name('upload_video');

Route::get('/setting','Musician\MusicianController@setting')->name('musician_setting');
Route::get('/edit_account/{id}','Musician\MusicianController@edit_account')->name('edit_account');
Route::post('/update_account/{id}','Musician\MusicianController@update_account')->name('update_account');
Route::post('/update_password/{id}','Musician\MusicianController@update_password')->name('update_password');
Route::get('/edit_links/{id}','Musician\MusicianController@edit_links')->name('edit_links');
Route::post('/update_links/{id}','Musician\MusicianController@update_links')->name('update_links');

Route::get('/redeem','Musician\MusicianController@redeem')->name('musician_redeem');

Route::get('/musician_logout', 'Musician\MusicianController@musician_logout')->name('logout_musician');

});

Auth::routes();

Route::get('home1', 'HomeController@user_dashboard')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');