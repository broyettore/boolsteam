@extends('layouts.app')

@section('title')

<div class="container my-4 text-center">
    <h1>Games</h1>
</div>

@endsection

@section('page.main')

<div class="container">

    <button class="btn btn-primary mb-3">
        <a href="{{ route('admin.games.create') }}" class="text-light">Aggiungi</a>
    </button>

    <ul class="d-flex flex-wrap gap-3 list-unstyled">
        @foreach ($games as $game)
        <li>
            <div class="card" style="width: 18rem;">
                <img src="{{$game->url}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4 class="card-title">{{$game->title}}</h4>
                    <p class="card-text">Descrizione: {{$game->description}}</p>
                    <h3 class="card-title">{{$game->price}}€</h3>
                    <a href="{{ route('admin.games.show', $game->id) }}">Vedi info</a>
                    <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('admin.games.destroy', $game->id )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>


@endsection
