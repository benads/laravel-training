<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the user information.
     *
     * @param int $id
     * @return void
     */
    public function show()
    {
        $user = Auth::user();
        return response($user, 200);
    }
}
