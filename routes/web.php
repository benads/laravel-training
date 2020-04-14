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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/{id}', 'UserController@show')->name('user.show');

Route::get('/post/{id}', 'PostController@show')->name('post.show');

Route::get('authById/{user_id}', 'GroupController@authById')->name('authById');

Route::post('groups/{id}/notify', 'GroupController@notify')->name('notify');

Auth::routes();

Route::get('/groups', 'GroupController@index')->name('groups');
