<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_friends');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
