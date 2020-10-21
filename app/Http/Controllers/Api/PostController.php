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
     *      operationId="getpostsList",
     *      tags={"posts"},
     *      summary="Get list of posts",
     *      description="Returns list of posts",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @SWG\Response(response=401, description="unauthenticated"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of posts
     */
    public function index()
    {
        $user = Auth::user();

        $friends = $user->list->friends;

        $friend_id = [$user->id];
        
        $friend_id = $friends->pluck('id');

        $friend_id[] = $user->id;

        $posts = Post::whereIn('user_id', $friend_id)->orderBy('created_at', 'DESC')->get();

        return response($posts, 200);
    }

    public function myPosts()
    {
        $user = Auth::user();
        
        $posts = $user->posts;

        return response($posts, 200);
    }

    /**
     * @SWG\Post(
     *      path="/api/post/create",
     *      operationId="getpostsList",
     *      tags={"posts"},
     *      summary="Create post",
     *      description="Create post",
     *      @SWG\Response(
     *          response=201,
     *          description="successful operation"
     *       ),
     *       @SWG\Response(response=401, description="unauthenticated"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of posts
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $post = Post::create([
                    'content' => $request->content,
                    'title' => $request->title,
                    'user_id' => $user_id
                ]);
        
        $formattedPost = $this->postArray($post);
  
        return response($formattedPost, 201);
    }

    /**
     * @SWG\Get(
     *      path="/api/posts/{id}",
     *      operationId="getpostsList",
     *      tags={"posts"},
     *      summary="Show post in detail",
     *      description="Returns detail of post",
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @SWG\Response(response=401, description="unauthenticated"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of posts
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();

        $formattedPosts = $this->postArray($post);

        return response($formattedPosts, 200);
    }
}
