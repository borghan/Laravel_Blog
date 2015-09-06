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

Route::get('/post/{id}', 'ArticleController@show');

Route::get('/post/{id}/edit', 'ArticleController@edit');

Route::put('/post/{id}', 'ArticleController@update');

Route::delete('/post/{id}', 'ArticleController@destroy');

Route::post('/post/{id}/comment/store', 'CommentController@store');
