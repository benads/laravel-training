<?php

use App\Models\Post;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'Api\Auth\AuthController@login');
    Route::post('logout', 'Api\Auth\AuthController@logout');
    Route::post('refresh', 'Api\Auth\AuthController@refresh');
    Route::post('me', 'Api\Auth\AuthController@me');
    Route::post('post/create', 'Api\PostController@store');
});

Route::get('post', 'Api\PostController@index');
Route::get('post/{id}', 'Api\PostController@show');
