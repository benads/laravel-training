<form method="POST" action="{{ route('unlike', ['id' => $id]) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="post_id" value="{{ $id }}">
    <input type="hidden" name="like" value="0">
    <div class="control">
        <button style="border:transparent;background:none"> <img src="/images/unlike.svg" style="width:25px" /></button>
    </div>
</form>