<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\UserFriend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index()
    {
        $friends = Auth::user()->list->friends;

        return response($friends, 200);
    }

    public function friendRequest()
    {
        $friendRequestList = Auth::user()->list->requestFriend;

        return response($friendRequestList, 200);
    }

    public function addFriend(Request $request)
    {
        $currentUser = Auth::user();

        $req = $request->requested_user;

        $requestedUser = User::where('id', $req)->first();

        $requestedUser->list->allFriends()->attach($currentUser, ['accepted' => false, 'requested' => true]);

        $currentUser->list->allFriends()->attach($requestedUser, ['accepted' => false, 'requested'=> false]);

        return response(200);
    }

    public function acceptUser($requestedUser)
    {
        $currentUser = Auth::user();

        $requestedUser = User::where('id', $requestedUser)->first();

        $requestedUser->list->allFriends()->updateExistingPivot($currentUser->id, ['accepted' => 1, 'requested' => false]);

        $currentUser->list->allFriends()->updateExistingPivot($requestedUser->id, ['accepted' => 1, 'requested'=> false]);

        return response(200);
    }
}
