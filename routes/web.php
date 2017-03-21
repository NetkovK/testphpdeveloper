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



Auth::routes();

Route::get('/', function () {
    return redirect()->route('users');
});

Route::group([
    'prefix'=>'blog',
    'middleware' => 'auth'
], function () {

    Route::get('/users', [
        'as'=>'users',
        'uses'=>'UserController@index',
    ]);

    Route::get('/user/{user?}', [
        'middleware'=>'user',
        'as'=>'user',
        'uses'=>'UserController@show',
    ]);

    Route::post('/user/{user?}', [
        'middleware'=>'user',
        'as'=>'user.store',
        'uses'=>'UserController@store',
    ]);

    Route::get('/user/{user}/delete', [
        'middleware'=>'user',
        'as'=>'user.destroy',
        'uses'=>'UserController@destroy',
    ]);


    Route::get('/users/{user}', [
        'as'=>'users.posts',
        'uses'=>'PostController@userPosts',
    ]);

    Route::get('/create', [
        'as'=>'post.create',
        'uses'=>'PostController@create',
    ]);

    Route::post('/create', [
        'as'=>'post.store',
        'uses'=>'PostController@store',
    ]);

    Route::get('/{post}', [
        'as'=>'post.show',
        'uses'=>'PostController@show',
    ]);

    Route::get('/{post}/update', [
        'middleware'=>'post',
        'as'=>'post.update',
        'uses'=>'PostController@create',
    ]);

    Route::post('/{post}/update', [
        'middleware'=>'post',
        'as'=>'post.update.store',
        'uses'=>'PostController@store',
    ]);
});

