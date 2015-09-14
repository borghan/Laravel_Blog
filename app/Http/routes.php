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

Route::get('/', ['as'=>'index', 'uses'=>'ArticleController@index']);

Route::get('/post/{id}', 'ArticleController@show');

Route::post('/post/{id}/comment/store', ['as'=>'createComment', 'uses'=>'CommentController@store']);

Route::group(['prefix'=>'/post', 'middleware'=>'auth'], function() {
    Route::get('create', ['as'=>'createArticle', 'uses'=>'ArticleController@create']);
    Route::post('store', ['as'=>'storeArticle', 'uses'=>'ArticleController@store']);
    Route::get('{id}/edit', ['as'=>'editArticle', 'uses'=>'ArticleController@edit']);
    Route::put('{id}', ['as'=>'updateArticle', 'uses'=>'ArticleController@update']);
    Route::delete('{id}', ['as'=>'deleteArticle', 'uses'=>'ArticleController@destroy']);
});

Route::group(['prefix'=>'/auth'], function() {
    Route::get('login', ['as'=>'showLogin', 'uses'=>'Auth\AuthController@showLogin']);
    Route::post('login', ['as'=>'login', 'uses'=>'Auth\AuthController@login']);
    Route::get('logout', ['as'=>'logout', 'uses'=>'Auth\AuthController@logout']);
});

Route::group(['prefix'=>'/home', 'middleware'=>'auth'], function() {
    Route::get('/', ['as'=>'home', 'uses'=>'Home\HomeController@index']);
});
