<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Show the user information.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.show', compact('user'));
    }
}
