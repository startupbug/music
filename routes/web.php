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


// Route::get('/', function () {
//     return view('index');
// });
Route::group(['prefix' => 'admin','middleware' => 'is-admin'], function () {
    Route::get('/index', 'Admin\AdminController@is_admin')->name('is_admin');
    Route::post('AdminImageUpload',['as'=>'AdminImageUpload','uses'=>'Admin\AdminController@AdminImageUpload']);
    // Admin Profile Controlling Routes
    Route::get('/profile', 'Admin\AdminController@profile_view')->name('profile_view');
    Route::get('/edit_profile/{id}', 'Admin\AdminController@edit_admin_profile')->name('edit_admin');
    Route::post('update_admin_profile/{id}',['as'=>'update_admin_profile','uses'=>'Admin\AdminController@update_admin_profile']);

    // Users Controlling Routes
    Route::get('/users', 'Admin\AdminController@users')->name('users');
    Route::get('/edit_user_profile/{id}', 'Admin\AdminController@edit_user_profile')->name('edit_user_profile');
    Route::post('update_user_profile/{id}',['as'=>'update_user_profile','uses'=>'Admin\AdminController@update_user_profile']);
    Route::get('/view_user_profile/{id}', 'Admin\AdminController@view_user_profile')->name('view_user_profile');

    Route::get('/suspend_user/{id}/', ["as" => "suspend-user", "uses" => "Admin\AdminController@suspend_user"]);
    Route::get('/unsuspend_user/{id}/', ["as" => "unsuspend-user", "uses" => "Admin\AdminController@unsuspend_user"]);

    // Category Controlling Routes
    Route::get('categories', 'Admin\CategoryController@index')->name('categories');
    Route::get('create_category', 'Admin\CategoryController@create')->name('create_category');
    Route::post('create_new_category', 'Admin\CategoryController@store')->name('create_new_category');
    Route::get('delete_category/{id}', 'Admin\CategoryController@destroy')->name('delete_category');
    Route::get('edit_category/{id}', 'Admin\CategoryController@edit')->name('edit_category');
    Route::post('update_category/{id}', 'Admin\CategoryController@update')->name('update_category');

    // Tracks/Albums Controlling Routes
    Route::get('tracks', 'Admin\MusicController@track_index')->name('tracks');
    Route::get('albums', 'Admin\MusicController@album_index')->name('albums');

    Route::get('/featured/{id}/', ["as" => "approve-admin-featured", "uses" => "Admin\MusicController@admin_approve_featured"]);
    Route::get('/un_featured/{id}/', ["as" => "disapprove-admin-featured", "uses" => "Admin\MusicController@admin_disapprove_featured"]);

    Route::get('/block_track/{id}/', ["as" => "block-track", "uses" => "Admin\MusicController@block_track"]);
    Route::get('/unblock_track/{id}/', ["as" => "unblock-track", "uses" => "Admin\MusicController@unblock_track"]);

    Route::get('/redeem','Admin\AdminController@redeem_index')->name('redeem_index');
    Route::get('/accept_redeem_request/{id}/', ["as" => "accept-redeem-request", "uses" => "Admin\AdminController@accept_redeem_request"]);
    Route::get('/reject_redeem_request/{id}/', ["as" => "reject-redeem-request", "uses" => "Admin\AdminController@reject_redeem_request"]);

    Route::get('/contest','Admin\ContestController@contest_index')->name('contest_index');
    Route::get('create_contest', 'Admin\ContestController@create')->name('create_contest');
    Route::post('create_new_contest', 'Admin\ContestController@store')->name('create_new_contest');
    Route::get('delete_contest/{id}', 'Admin\ContestController@destroy')->name('delete_contest');
    Route::get('edit_contest/{id}', 'Admin\ContestController@edit')->name('edit_contest');
    Route::post('update_contest/{id}', 'Admin\ContestController@update')->name('update_contest');


    Route::get('contest_participant/{id}', 'Admin\ContestController@contest_participant')->name('contest_participant');
    Route::get('/accept_request/{id}/', ["as" => "accept-request", "uses" => "Admin\ContestController@accept_request"]);
    Route::get('/reject_request/{id}/', ["as" => "reject-request", "uses" => "Admin\ContestController@reject_request"]);

    Route::get('/logout_admin', 'Admin\AdminController@admin_logout')->name('logout_admin');
});

Route::get('/contest_listing','PagesController@contest_listing')->name('contest_listing');
Route::get('/','PagesController@index')->name('home1');
Route::get('/profile/{id}','PagesController@profile')->name('profile');
Route::post('/submit_rating','PagesController@submit_rating')->name('submit_rating');
Route::post('/submit_points','PagesController@submit_points')->name('submit_points');
Route::post('/download_file/{file_name}/{track_id}/{name?}','PagesController@download_file')->name('download_file');

Route::get('register/verify/{token}', 'Auth\RegisterController@verify')->name('verified_email');



// Route::get('/index', 'HomeController@public_index')->name('public_index');

// Route::get('/main_index','HomeController@dashboard')->name('main_index');
// songs categories
Route::get('/country','PagesController@country_songs')->name('country_songs');
Route::get('/jazz_songs','PagesController@jazz_songs')->name('jazz_songs');
Route::get('/hiphop_songs','PagesController@hiphop_songs')->name('hiphop_songs');
Route::get('/metallic_songs','PagesController@metallic_songs')->name('metallic_songs');

Route::post('/subscribe','PagesController@subscribe')->name('subscribe');

Route::get('/contest/','PagesController@contest')->name('contest');

Route::get('/winner','PagesController@winner')->name('winner');

Route::get('/faq','PagesController@faq')->name('faq');

Route::get('/how_it_works','PagesController@how_it_works')->name('how_it_works');

Route::get('/musicvoting_genre/{id}/{name?}','PagesController@musicvoting_genre')->name('musicvoting_genre');

Route::get('/artist_detail','PagesController@artist_detail')->name('artist_detail');

Route::get('/musicvoting_search','PagesController@musicvoting_search')->name('musicvoting_search');

Route::post('/insert_comment/{id}','CommentController@insert_comment')->name('insert_comments');

Route::get('/album/{id}','PagesController@album_view')->name('album_view');

Route::get('/genre','PagesController@genre')->name('genre');

Route::get('/terms','PagesController@terms')->name('terms');

Route::get('/privacy','PagesController@privacy')->name('privacy');

Route::group(['prefix' => 'promoter', 'middleware' => 'promoter'], function () {
Route::post('ajaxImageUpload',['as'=>'promoterImageUpload','uses'=>'Promoter\PrmoterController@promoter_image']);
    Route::get('/promoterindex','Promoter\PrmoterController@index')->name('promoterindex');
    Route::get('/promoterdashboard','Promoter\PrmoterController@dashboard_overview')->name('promoterdashboard');
    Route::get('/musicvoting_tracks','Promoter\PrmoterController@musicvoting_tracks')->name('promotermusicvoting_tracks');
    Route::get('/redeempoint','Promoter\PrmoterController@redeempoint')->name('promoterredeempoint');
    Route::get('/setting','Promoter\PrmoterController@setting')->name('promotersetting');
    Route::get('/edit/{id}','Promoter\PrmoterController@edit')->name('editpromoter');
    Route::post('/update_account/{id}','Promoter\PrmoterController@update_account')->name('promoter_update_account');
    Route::get('/edit_links/{id}','Promoter\PrmoterController@edit_links')->name('promoter_edit_links');
    Route::post('/update_links/{id}','Promoter\PrmoterController@update_links')->name('promoter_update_links');
    Route::post('/update_password/{id}','Promoter\PrmoterController@promoter_update_password')->name('promoter_update_password');
    Route::get('/tracks_assign','Promoter\PrmoterController@promoter_track_assign')->name('promoter_track_assign');
    Route::get('/unapproved_invitations','Promoter\PrmoterController@unapproved_invitations')->name('unapproved_invitations');
    Route::get('/approve_status/{id}/', ["as" => "approve-status", "uses" => "Promoter\PrmoterController@approve_status"]);
    Route::get('/disapprove_status/{id}/', ["as" => "disapprove-status", "uses" => "Promoter\PrmoterController@disapprove_status"]);
    Route::get('/all_albums/{id}/','Promoter\PrmoterController@all_albums')->name('promoter_all_albums');
    Route::get('delete_image','Promoter\PrmoterController@delete_image')->name('delete_image2');
    Route::get('/promoter_logout', 'Promoter\PrmoterController@promoter_logout')->name('logout_promoter');
    //promoter_redeemed_request
    Route::post('/promoterredeempoint','Promoter\PrmoterController@promoter_redeemed_request')->name('promoter_redeemed_request');
});


Route::group(['prefix' => 'user', 'middleware' => 'is-user'], function () {
   Route::post('userImageUpload',['as'=>'userImageUpload','uses'=>'User\RegisteredController@user_image']);
   Route::get('/index','User\RegisteredController@index')->name('user_index');
   Route::get('/setting','User\RegisteredController@setting')->name('user_setting');
   Route::get('/edit/{id}','User\RegisteredController@edit')->name('edituser');
   Route::post('/update_account/{id}','User\RegisteredController@update_account')->name('user_update_account');
   Route::get('/edit_links/{id}','User\RegisteredController@edit_links')->name('user_edit_links');
   Route::post('/update_links/{id}','User\RegisteredController@update_links')->name('user_update_links');
   Route::get('album_videos/{id}','User\RegisteredController@album_videos')->name('user_album_videos');
   Route::post('userajaxImageUpload',['as'=>'userImageUpload','uses'=>'User\RegisteredController@user_images']);
   Route::post('/update_password/{id}','User\RegisteredController@user_update_password')->name('user_update_password');
   Route::get('/all_tracks', 'User\RegisteredController@all_tracks')->name('all_tracks');
   Route::get('/all_albums', 'User\RegisteredController@all_albums')->name('all_albums');
   Route::get('delete_image','User\RegisteredController@delete_image')->name('delete_image3');
   Route::get('/user_logout', 'User\RegisteredController@user_logout')->name('logout_user');

});
//Route::get('/promoterindex','PrmoterController@index')->name('promoterindex');

Route::group(['prefix' => 'musician', 'middleware' => 'is-musician'], function () {
Route::post('/redeemed_request','Musician\MusicianController@redeemed_request')->name('redeemed_request');

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
Route::post('/update_video/{id}/','Musician\TracksController@update_video')->name('update_video');

Route::get('/album','Musician\AlbumsController@index')->name('musician_album');
Route::get('/edit_album/{id}','Musician\AlbumsController@edit')->name('edit_album');
Route::post('/update_album/{id}/','Musician\AlbumsController@update_album')->name('update_album');
Route::post('/add_video','Musician\AlbumsController@add_video')->name('add_video');
Route::get('/delete_album/{id}/','Musician\AlbumsController@destroy')->name('delete_album');
Route::get('/delete_from_album/{album_id}/{track_id}','Musician\AlbumsController@delete_from_album')->name('delete_from_album');
Route::get('/create_album','Musician\AlbumsController@create')->name('create_album');
Route::post('/upload_album','Musician\AlbumsController@store')->name('upload_album');

Route::post('/upload_video','Musician\AlbumsController@upload_video')->name('upload_video');

Route::get('/setting','Musician\MusicianController@setting')->name('musician_setting');
Route::get('/edit_account/{id}','Musician\MusicianController@edit_account')->name('edit_account');
Route::post('/update_account/{id}','Musician\MusicianController@update_account')->name('update_account');
Route::post('/update_password/{id}','Musician\MusicianController@update_password')->name('update_password');
Route::get('/edit_links/{id}','Musician\MusicianController@edit_links')->name('edit_links');
Route::post('/update_links/{id}','Musician\MusicianController@update_links')->name('update_links');
Route::get('/approve_featured/{id}/', ["as" => "approve-featured", "uses" => "Musician\MusicianController@approve_featured"]);
Route::get('/disapprove_featured/{id}/', ["as" => "disapprove-featured", "uses" => "Musician\MusicianController@disapprove_featured"]);
Route::get('/redeem','Musician\MusicianController@redeem')->name('musician_redeem');
Route::get('delete_image','Musician\MusicianController@delete_image')->name('delete_image1');
Route::get('/musician_logout', 'Musician\MusicianController@musician_logout')->name('logout_musician');

});

Auth::routes();

Route::get('home1', 'HomeController@user_dashboard')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search_result','PagesController@search_result')->name('search_result');


Route::get('/getAffiliatedID', 'PagesController@getAffiliatedID')->name('getAffiliatedID');



Route::get('redeem_points/{flag}', 'PaypalController@getCheckout')->name('redeem_points');
Route::get('getDone/', 'PaypalController@getDone')->name('getDone');
Route::get('getCancel/', 'PaypalController@getCancel')->name('getCancel');


Route::get('redirectDashboard', 'Auth\LoginController@authenticated')->name('redirectDashboard');
