@extends('layouts.app')

@section('title')

<div class="container my-4 text-center">
    <h1>Games</h1>
</div>

@endsection

@section('page.main')

<div class="container py-3">

    <button class="btn btn-primary mb-3">
        <a href="{{ route('admin.games.create') }}" class="text-light">Aggiungi</a>
    </button>


      <div class="d-flex flex-wrap gap-3">
        @foreach ($games as $game)

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title"><img src=" {{ asset("storage/" . $game->image) }}" alt="{{ $game->title }}" class="img-fluid"></h4>
                <p class="card-text">Descrizione: {{$game->description}}</p>
                <h3 class="card-title">{{$game->price}}€</h3>
                <a href="{{ route('admin.games.show', $game->id) }}">Vedi info</a>
                <div class="d-flex mt-3">
                    <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-success">Edit</a>
                    <form action="{{ route('admin.games.destroy', $game->id )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ms-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>

    @endforeach
      </div>

</div>


@endsection
