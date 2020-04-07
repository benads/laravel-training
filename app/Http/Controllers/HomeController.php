<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;
use App\Events\UserWasBanned;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        event(new UserSignedUp('John Doe'));
        // $user = User::latest()->first();
        // event(new UserWasBanned($user));
        return view('home');
    }
}
