@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Liste des groupes</h1>
        @foreach ($groups as $group)
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong> {{ $group->name }} : </strong>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($group->users as $user)
                            <li class="list-group-item">
                                <a href="{{ route('authById', $user->id) }}">
                                    {{ $user->email }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection