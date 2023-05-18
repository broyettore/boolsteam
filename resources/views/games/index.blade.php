@extends('layouts.app')

@section('title')
<div class="container my-4 text-center">
    <h1>Games</h1>
</div>
@endsection

@section('page.main')

<div class="container">
    <button class="btn btn-primary mb-3">
        <a href="{{ route('games.create') }}" class="text-light">Aggiungi</a>
    </button>
    <ul class="d-flex flex-wrap gap-3 list-unstyled">
        @foreach ($games as $game)
        <li>
            <div class="card" style="width: 18rem;">
                <img src="{{$game->url}}" class="card-img-top" alt="...">
                <div class="card-body">

                    <h4 class="card-title">{{$game->title}}</h4>
                    <p class="card-text">Descrizione: {{$game->description}}</p>
                    <h3 class="card-title">{{ $game->price }} €</h3>
                    <a href="{{ route('games.show', $game->id) }}">Vedi info</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>


@endsection
