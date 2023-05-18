@extends('layouts.app')

@section('title')
<div class="container my-4 text-center">
    <h1>{{ $game->title }}</h1>
</div>
@endsection

@section('page.main')
<div class="container">

    <p>{{ $game->description }}</p>
    <div class="d-flex flex-column">
        <ul class="list-unstyled">

            <li class="text-center my-3"><img src="{{ $game->url }}"></li>

            <li>Description: {{ $game->description }}</li>
            <li>Genre: {{ $game->genres }}</li>
            <li>Languages:{{ $game->languages }}</li>
            <li>Editor: {{ $game->editor }}</li>
            <li>Developers: {{ $game->developer }}</li>
            <li>Release date: {{ $game->release }}</li>
            <li>PEGI {{ $game->pegi }}</li>
            <li class="mt-2">Price: {{ $game->price }} €</li>
            <li><a class="btn btn-primary mt-4" href="{{ route('games.index') }}">Back</a></li>
        </ul>
    </div>
</div>
@endsection
