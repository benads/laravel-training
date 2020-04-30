<?php

use App\Models\Post;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('post', 'Api\PostApiController@index');

Route::post('post/create', 'Api\PostApiController@store');
