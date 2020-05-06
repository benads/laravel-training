<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' =>  Hash::make($request->password),
            'group_id' => "2",
            'name' => $request->name,
        ]);

        return response($user, 201);
    }
}
