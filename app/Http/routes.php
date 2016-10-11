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

Route::group(['prefix'=>'article'],function(){
	Route::any('upload', 'ArticleController@upload');
	Route::any('addComment', 'ArticleController@addComment');
	Route::any('query', 'ArticleController@queryById')->middleware(['anony']);
	Route::any('queryByClassify', 'HomeController@index')->middleware(['anony']);
	Route::any('alter', 'ArticleController@alter');
});
Route::auth();

Route::any('/index', 'HomeController@index')->middleware(['anony']);
