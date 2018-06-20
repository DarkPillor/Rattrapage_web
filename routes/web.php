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

Route::resource('activitys','activityController');
Route::resource('idee', 'ideeController');

Route::resource('Photos','PhotosController');
Route::post('Photos/{id}', 'PhotosController@update');


Route::post('Vote/{id}', 'VoteController@update');
Route::delete('Vote/{id}','VoteController@destroy');
Route::resource('Vote', 'VoteController');

Route::post('Comment/{id}','CommentController@update');
// Route::get('Comment/{Comment}/edit', 'CommentController@edit');
Route::resource('Comment', 'CommentController');

Route::resource('LikePhoto', 'LikephotosController');
Route::post('LikePhoto/{id}', 'LikephotosController@update');
Route::delete('LikePhoto/{id}', 'LikephotosController@destroy');

Route::post('Register/{id}', 'RegisterController@update');
Route::Delete('Register/{id}', 'RegisterController@destroy');
Route::resource('Register', 'RegisterController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
