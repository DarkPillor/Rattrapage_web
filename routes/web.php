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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('activitys','activityController')->middleware('auth');
Route::resource('idee', 'ideeController')->middleware('auth');

Route::resource('Photos','PhotosController')->middleware('auth');
Route::post('Photos/{id}', 'PhotosController@update')->middleware('auth');


Route::post('Vote/{id}', 'VoteController@update')->middleware('auth');
Route::delete('Vote/{id}','VoteController@destroy')->middleware('auth');
Route::resource('Vote', 'VoteController')->middleware('auth');

Route::post('Comment/{id}','CommentController@update')->middleware('auth');
// Route::get('Comment/{Comment}/edit', 'CommentController@edit');
Route::resource('Comment', 'CommentController')->middleware('auth');

Route::resource('LikePhoto', 'LikephotosController')->middleware('auth');
Route::post('LikePhoto/{id}', 'LikephotosController@update')->middleware('auth');
Route::delete('LikePhoto/{id}', 'LikephotosController@destroy')->middleware('auth');

Route::get('Register/{id}', 'RegisterController@CSV')->middleware('auth');
Route::post('Register/{id}', 'RegisterController@update')->middleware('auth');
Route::Delete('Register/{id}', 'RegisterController@destroy')->middleware('auth');
Route::resource('Register', 'RegisterController');

Route::get('generate-pdf','HomeController@generatePDF')->middleware('auth');
