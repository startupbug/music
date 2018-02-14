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

Route::get('/index', 'HomeController@public_index')->name('public_index');




