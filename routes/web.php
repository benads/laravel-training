<?php

use Predis\Client;

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

Route::get('/', function () {
    
    // 1. Publish event with Redis
    $data = [
            'event' => 'UserSignedUp',
            'data' => [
                'username' => 'JohnDoe',
            ],
        ];

    $redis = new Client();

    $redis->publish('test-channel', json_encode($data));

    // 2. Node.js + Redis subscribe to the event
    // socket.js

    return view('welcome');
    
    
    
    // 3. Use socket.io to emit to all clients
});
