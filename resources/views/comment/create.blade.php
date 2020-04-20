@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('comment.store', ['id' => $id]) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <input class="form-control" type="text" name="comment" placeholder="Titre du post">
    </div>
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="post_id" value="{{ $id }}">
    <div class="control">
        <button class="btn btn-primary">Envoyer</button>
    </div>
</form>