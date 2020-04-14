@extends('layouts.app')

@section('content')
<div class="container">

    <div class="flex">
        <h2>
            {{ $user->name }}
        </h2>
        <p>
            {{ $user->email }}
        </p>
        <button id="notify">Notify</button>
    </div>

    @foreach ($user->posts as $post)
    <div class="card" style="border: 0.1px solid black; margin: 20px;padding:20px">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <p class="card-title">{{ $post->content }}</p>
            <h5 class="card-text"> Author: {{ $user->name }}</h5>
            <a href="#" class="btn btn-primary">Go to the post</a>
        </div>
    </div>
    @endforeach
</div>
@endsection