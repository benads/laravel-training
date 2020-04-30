<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id)
    {
        $postId = Post::find($id)->id;

        Like::create([
            'like' => 1,
            'post_id' => $postId,
            'user_id' => Auth::user()->id
        ]);
    
        return response(200);
    }

    public function unlike($id)
    {
        $postId = Post::find($id)->id;

        Like::where([[
            'user_id', Auth::user()->id],
            ['post_id', $postId]
        ])->delete();

        return response(200);
    }
}
