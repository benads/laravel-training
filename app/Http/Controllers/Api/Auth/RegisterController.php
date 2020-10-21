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
        $user_fillable = ['email', 'name', 'first_name', 'last_name', 'pseudo'];

        $user_attributes = $request->only($user_fillable);
        $user_attributes['password'] = Hash::make($request->password);
        $user_attributes['group_id'] = 1;
    
        $user = User::create($user_attributes);

        return response($user, 201);
    }
}