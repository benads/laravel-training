<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create()
    {
        return view('comment.create');
    }

    public function store(Request $request)
    {
        Comment::create($request->only(['comment', 'post_id', 'user_id']));

        return back();
    }
}
