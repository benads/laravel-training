<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;

class HomeController
{
    public function index () 
    {
        event(new UserSignedUp('John Doe'));
        return view('welcome');
    }
}