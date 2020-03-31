<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Events\GroupWizzEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    /**
     * Login with on of user's application
     *
     */
    public function authById($user_id)
    {
        Auth::loginUsingId($user_id);
        return redirect()->route('groups');
    }

    public function notify($group_id)
    {
        $group = Group::find($group_id);
        event(new GroupWizzEvent($group));
        return redirect()->back();
    }
}
