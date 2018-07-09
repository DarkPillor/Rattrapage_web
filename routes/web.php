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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

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

Route::get('Register/{id}', 'RegisterController@CSV');
Route::post('Register/{id}', 'RegisterController@show');
Route::Delete('Register/{id}', 'RegisterController@destroy');
Route::resource('Register', 'RegisterController');

Route::resource('pastactivity', 'pastActivityController');
Route::get('generate-pdf','HomeController@generatePDF');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//Route pour prévenir que certaines choses peuvent nuire à l'image de l'école
Route::post('/idee/contact/{id}', 'AvertissmentController@idee');
Route::post('/Photos/contact/{id}', 'AvertissmentController@image');
Route::post('/Comment/contact/{id}', 'AvertissmentController@commentaire');
