<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Show the form resource.
     *
     * @return void
     */
    public function create()
    {
        return view('like.create');
    }

    public function store(Request $request)
    {
        Like::create($request->only(['like', 'post_id', 'user_id']));
        return back();
    }
}
