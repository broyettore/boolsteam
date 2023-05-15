@extends('layouts.app')

@section('title')
@endsection

@section('page.main')

<div>
    <ul>
        @foreach ($games as $game)
            
        <li>
            {{$game->title}}
        </li>
        @endforeach

    </ul>
</div>


@endsection