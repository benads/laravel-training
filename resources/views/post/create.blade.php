<form method="POST" action="{{ route('post.store') }}">
    {{ csrf_field() }}
    <label class="label">Titre</label>
    <div class="control">
        <input class="input" type="text" name="title" placeholder="Titre du post">
    </div>
    <label class="label">Contenu</label>
    <div class="control">
        <input class="input" type="text" name="content" placeholder="Contenu du post">
    </div>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="control">
        <button class="button is-link">Envoyer</button>
    </div>
</form>