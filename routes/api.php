<?php

use App\Models\Post;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'api',], function () {
    Route::post('login', 'Api\Auth\AuthController@login');
    Route::post('logout', 'Api\Auth\AuthController@logout');
    Route::post('refresh', 'Api\Auth\AuthController@refresh');
    Route::post('me', 'Api\Auth\AuthController@me');
    Route::post('post/create', 'Api\PostController@store');
    Route::get('profile', 'Api\UserController@show');
    Route::post('post/{id}/like', 'Api\LikeController@like');
    Route::delete('post/{id}/unlike', 'Api\LikeController@unlike');
    Route::get('posts', 'Api\PostController@index');
    Route::get('post/{id}', 'Api\PostController@show');
    Route::post('post/{id}/comment', 'Api\CommentController@store');
    Route::get('friends', 'Api\FriendController@index');
    Route::post('friends/addFriend', 'Api\FriendController@addFriend');
    Route::get('friends/request', 'Api\FriendController@friendRequest');
    Route::post('friends/request/{requestedUser}', 'Api\FriendController@acceptUser');
});
