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

//Route::get('/', 'HomeController@index');
Route::get('/', 'GigController@indexh');
Route::get('create-gig','GigController@index')->middleware('auth');
Route::post('create-gig','GigController@createGig')->middleware('auth');
Route::get('create-profile','ProfileController@index')->middleware('auth')->name('create-profile');
Route::post('create-profile','ProfileController@createProfile')->middleware('auth');
Route::get('profile/{user_id}','ProfileController@profile')->middleware('auth')->name('profile');
Route::get('gig/{gig_id}/{gig_title}','GigController@gigDetail')->middleware('auth')->name('gig');
Route::get('confirm-order/{gig_id}','OrderController@createOrder')->middleware('auth')->name('order');
Route::get('dashboard','UserController@dashboard')->middleware('auth')->name('dashboard');
Route::get('dashboard/seller/order/','OrderController@SellerOrder')->middleware('auth')->name('sellerorder');
Route::get('dashboard/buyer/order/','OrderController@BuyerOrder')->middleware('auth')->name('buyerorder');
Route::get('profilefinder/{user_id}','ProfileController@profilefinder')->middleware('auth')->name('profilefinder');
Route::delete('deletegig/{gig_id}','GigController@deleteGig')->middleware('auth')->name('deletegig');
Route::post('updategig/{gig_id}','GigController@updateGig')->middleware('auth')->name('updategig');
Route::get('editgig/{gig_id}','GigController@editGig')->middleware('auth')->name('editgig');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('review/{gig_id}','ReviewController@review')->middleware('auth')->name('review');
Route::get('dummyprofile','ProfileController@createDummyProfile')->middleware('auth')->name('dummyprofile');
Route::post('search','GigController@search')->name('search');
Route::get('categories/{name}','GigController@categoryGig')->middleware('auth')->name('categories');












