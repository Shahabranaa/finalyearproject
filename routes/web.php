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

Route::get('/home', 'HomeController@index');

Route::get('create-gig','GigController@index')->middleware('auth');
Route::post('create-gig','GigController@createGig')->middleware('auth');
Route::get('create-profile','ProfileController@index')->middleware('auth');
Route::post('create-profile','ProfileController@createProfile')->middleware('auth');
Route::get('profile','ProfileController@profile')->middleware('auth');




