<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function userLiked($postId)
    {
        $p = Like::where([['user_id', Auth::user()->id], [ 'post_id', $postId]])->first();
        
        return $p ? true : false;
    }

    public function countLike($postId)
    {
        return Like::where([
            ['post_id', $postId],
            ['like', true]
        ])->count();
    }
}
