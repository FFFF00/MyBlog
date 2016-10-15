<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});



Route::auth();

Route::any('/index', 'HomeController@index')->middleware(['anony']);
Route::any('/write', 'ArticleController@writeBlog');

Route::group(['prefix'=>'article'],function(){
	Route::any('/', 'ArticleController@queryById')->middleware(['anony']);
	Route::any('upload', 'ArticleController@upload');
	Route::any('addComment', 'ArticleController@addComment');
	Route::any('alter', 'ArticleController@alter');
});