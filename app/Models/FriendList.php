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
    
    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_friends');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
