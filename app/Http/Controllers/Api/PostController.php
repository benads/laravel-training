<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $formattedPosts = [];

        $posts = Post::all();

        foreach ($posts as $post) {
            $formattedPosts[] = [
                "id" => $post->id,
                "title" => $post->title,
                "likes" => $post->countLike($post->id)
            ];
        }


        return response($formattedPosts, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $post = Post::create([
                    'content' => $request->content,
                    'title' => $request->title ,
                    'user_id' => $user_id
                ]);
  
        return response($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return response($post, 200);
    }
}
