<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['author'];
    
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
        $p = Like::where([['user_id', Auth::user()->id], [ 'post_id', $postId]])->get();

        $l = null;

        foreach ($p as $o) {
            return $l = $o->like;
        }

        return !is_null($l) ? true : false;
    }

    public function countLike($postId)
    {
        return Like::where([
            ['post_id', $postId],
            ['like', true]
        ])->count();
    }

    /**
     * Get the author of the post.
     *
     * @return bool
     */
    public function getAuthorAttribute()
    {
        return $this->user->name;
    }
}
