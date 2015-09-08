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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', 'ArticleController@index');

Route::get('/post/create', 'ArticleController@create');

Route::post('/post/store', 'ArticleController@store');

Route::get('/post/{id}', 'ArticleController@show')->where('id', '[0-9]+');;

Route::get('/post/{id}/edit', 'ArticleController@edit')->where('id', '[0-9]+');;

Route::put('/post/{id}', 'ArticleController@update')->where('id', '[0-9]+');;

Route::delete('/post/{id}', 'ArticleController@destroy')->where('id', '[0-9]+');;

Route::post('/post/{id}/comment/store', 'CommentController@store')->where('id', '[0-9]+');;
