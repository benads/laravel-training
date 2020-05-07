<?php

namespace App\Observers;

use App\Models\FriendList;
use App\Models\User;

class UserObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user)
    {
        FriendList::create([
            "user_id" => $user->id
        ]);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}
