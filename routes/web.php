<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/user/{id}', 'UserController@show')->name('user.show');

    Route::get('/post/{id}', 'PostController@show')->name('post.show');

    Route::post('/post/{id}/comment/create', 'CommentController@store')->name('comment.store');

    Route::post('/post/create', 'PostController@store')->name('post.store');

    Route::post('/post/{id}/like', 'LikeController@like')->name('like');

    Route::delete('/post/{id}/unlike', 'LikeController@unlike')->name('unlike');

    Route::get('authById/{user_id}', 'GroupController@authById')->name('authById');

    Route::post('groups/{id}/notify', 'GroupController@notify')->name('notify');

    Route::get('/groups', 'GroupController@index')->name('groups');
});


// Auth::routes();
