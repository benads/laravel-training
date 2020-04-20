@extends('layouts.app')

@section('content')
<div class="container">
    <h1>HOME</h1>
    <h2>Tout les posts</h2>
    @include('post.create')
    @foreach ($posts as $post)
    <div class="card" style="border: 0.1px solid black; margin: 20px;padding:20px">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <p class="card-title">{{ $post->content }}</p>
            @if ($post->user)
            <h5 class="card-text"> Author: {{ $post->user->name }}</h5>

            @foreach ($post->tags as $tag)
            @if ($tag)
            <h6><span class="badge badge-secondary">Tag</span>{{$tag->name}} </h6>
            @endif
            @endforeach
            <div>
                {{$post->countLike($post->id)}} Like
            </div>
            {{-- {{dump($post->userLiked($post->id) ? 'ok' : 'not ok')}} --}}
            @include('like.create', ['id' => $post->id, 'like' => $post->userLiked($post->id) ? false : true])
            <a href={{route('post.show', ['id'=>$post->id]) }} class="btn btn-primary">Go to the post</a>
            @if ($post->comments && $post->comments->count() > 0)
            <div class="container">
                <h3>Commentaires</h3>
                @foreach ($post->comments as $comment)
                <p class="card_text"> {{ $comment->comment }}</p>
                @endforeach
            </div>
            @else

            @endif
            @endif
            @include('comment.create', ['id' => $post->id])
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection