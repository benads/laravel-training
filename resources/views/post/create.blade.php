<form method="POST" action="{{ route('post.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <input class="form-control" type="text" name="title" placeholder="Titre du post">
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="content" placeholder="Contenu du post">
    </div>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="control">
        <button class="btn btn-primary">Envoyer</button>
    </div>
</form>