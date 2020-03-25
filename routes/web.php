<?php

use App\Events\UserSignedUp;
use Illuminate\Support\Facades\Redis;
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

Route::get('authById/{user_id}', 'HomeController@authById')->name('authById');

Auth::routes();

Route::get('/groups', 'GroupController@index')->name('groups');
