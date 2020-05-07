<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'friend_lists';

    protected $guarded = [];
    
    public function allFriends()
    {
        return $this->belongsToMany(User::class, 'user_friends', 'friend_id')->withPivot('accepted', 'requested');
    }

    public function requestFriend()
    {
        return $this->allFriends()->where('requested', true);
    }

    public function friends()
    {
        return $this->allFriends()->where('accepted', true);
    }

    public function friendsCount()
    {
        return $this->friends()->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
