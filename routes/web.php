<?php

use App\Events\UserSignedUp;
use Illuminate\Support\Facades\Redis;

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

    $data = [
            'event' => 'UserSignedUp',
            'data' => [
                'username' => 'JohnDoe',
            ],
    ];

   
    $redis = Redis::connection();

    $redis->publish('test-channel', json_encode($data));

    // 2. Node.js + Redis subscribe to the event
    // socket.js    
    
    // 3. Use socket.io to emit to all clients
    // welcome.blade.php

    event(new UserSignedUp('JohnDoe'));
    
    return view('welcome');
});

// Route::get('/', 'HomeController@index')->name('homeIndex');


