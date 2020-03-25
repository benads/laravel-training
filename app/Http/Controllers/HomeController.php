<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }

    public function authById($user_id) {
        Auth::loginUsingId($user_id);
        return redirect()->route('home');
    }
}
