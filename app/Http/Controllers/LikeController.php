<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Show the form resource.
     *
     * @return void
     */
    public function create()
    {
        return view('like.like');
    }

    public function like(Request $request)
    {
        // $p = Like::where([['user_id', Auth::user()->id], [ 'post_id', $request->post_id]])->first();
        // dd($p);
        // if (!is_null($p)) {
        //     Like::where('user_id', $p->user_id)->delete();
        // }

        Like::create($request->only(['like', 'post_id', 'user_id']));
    
        return back();
    }

    public function edit()
    {
        return view('like.unlike');
    }

    public function unlike(Request $request)
    {
        Like::where([['user_id', Auth::user()->id], ['post_id', $request->post_id]])->delete();

        return back();
    }
}
