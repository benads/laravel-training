<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $comment = Comment::create([
                    'comment' => $request->comment,
                    'post_id' => $id ,
                    'user_id' => Auth::user()->id
                ]);
  
        return response($comment, 201);
    }
}
