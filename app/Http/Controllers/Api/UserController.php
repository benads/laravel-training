<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the user information.
     *
     * @param int $id
     * @return void
     */
    public function me()
    {
        $user = Auth::user();
        
        return response($user, 200);
    }

    public function index(Request $request)
    {
        $users = $request->query() ? User::whereLike('pseudo', $request->query()['s'])->get() : User::all();
        
        return response($users, 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response($user, 200);
    }
}
