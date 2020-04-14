<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('post.show', compact('post'));
    }
}
