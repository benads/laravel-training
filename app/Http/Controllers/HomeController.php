<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;
use Illuminate\Http\Request;

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
}
