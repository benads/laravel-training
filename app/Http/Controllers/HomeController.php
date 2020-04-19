<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;
use App\Events\UserWasBanned;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return void
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        event(new UserSignedUp('John Doe'));
        return view('home', compact('posts'));
    }
}
