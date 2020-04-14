@extends('layouts.app')

@section('content')
<div class="container">
    <h1>HOME</h1>
    <h2>Tout les posts</h2>
    @foreach ($posts as $post)
    <div class="card" style="border: 0.1px solid black; margin: 20px;padding:20px">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <p class="card-title">{{ $post->content }}</p>
            <h5 class="card-text"> Author: {{ $post->user->name }}</h5>
            <a href={{route('post.show', ['id'=>$post->id]) }} class="btn btn-primary">Go to the post</a>
            @if ($post->tags)
            {{$post->tags}}
            @endif
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection