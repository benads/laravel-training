<form method="POST" action="{{ route('like', ['id' => $id]) }}">
    {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="post_id" value="{{ $id }}">
    <input type="hidden" name="like" value="1">
    <div class="control">
        <button style="border:transparent;background:none"> <img src="/images/like.svg" style="width:25px" /></button>
    </div>
</form>