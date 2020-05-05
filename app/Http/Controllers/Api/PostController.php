<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * This array is returned for the posts.
     *
     * @param Object $post
     * @return array
     */
    public function postArray($post)
    {
        return [
            "id" => $post->id,
            "title" => $post->title,
            "content" => $post->content,
            "likes" => $post->countLike($post->id)
        ];
    }



    /**
     * @SWG\Get(
     *      path="/api/posts",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @SWG\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of projects
     */
    public function index()
    {
        $posts = Post::paginate();

        $formattedPosts = [
                           "current_page" => $posts->currentPage(),
                           "total_posts" => $posts->total(),
                           "next_page_url" => $posts->nextPageUrl()
                          ];

        foreach ($posts as $post) {
            $formattedPosts[] = $this->postArray($post);
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
        
        $formattedPost = $this->postArray($post);
  
        return response($formattedPost, 201);
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

        $formattedPosts = $this->postArray($post);

        return response($formattedPosts, 200);
    }
}
