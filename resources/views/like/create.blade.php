<form method="POST" action="{{ route('like.store', ['id' => $id]) }}">
    {{ csrf_field() }}
    <p>ok</p>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="post_id" value="{{ $id }}">
    {{-- <input type="hidden" name="like" value="{{old('like', $dog->title)}}"> --}}
    <div class="control">
        <button class="btn btn-primary">LIKE</button>
    </div>
</form>