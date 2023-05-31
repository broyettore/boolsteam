@extends('layouts.app')

@section('title')
<div class="container my-4">
    <h1>{{ $game->title }}</h1>
</div>
@endsection

@section('page.main')
<div class="container">
    <div>
        <ul class="list-unstyled">
            <li class="my-3"><img src=" {{ asset("storage/" . $game->image) }}" alt="{{ $game->title }}" class="show-img"></li>
            {{-- <li>Description: {{ $game->description }}</li> --}}
            <li>Genre: 
                @foreach ($game->genres as $genre)
                @if ($loop->last)
                <span>{{ $genre->title }}</span>.
                @else     
                <span>{{ $genre->title }}</span>,
            @endif
                @endforeach
            </li>
            <li>Languages:{{ $game->languages }}</li>
            @if ($game->editor)
            <li>Editor: {{ $game->editor->name }}</li>
            @endif
            <li>Developers: {{ $game->developer }}</li>
            <li>Release date: {{ $game->release }}</li>
            <li>PEGI {{ $game->pegi }}</li>
            <li class="mt-2">Price: {{ $game->price }} €</li>
            <li><a class="btn btn-primary mt-4" href="{{ route('admin.games.index', $game->id) }}">Back</a></li>
        </ul>
    </div>
</div>
@endsection
