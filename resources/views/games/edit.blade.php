@extends('layouts.app')

@section('title')
    <div class="container">
        <h1>MODIFICA ELEMENTO</h1>
    </div>
@endsection

@section('page.main')

    <div class="container">
        <a href="{{ route('games.index') }}" class="m-5 btn btn-primary">Torna alla lista</a>
        <H1>Modifica Elemento: {{$games->title}}</H1>

        <form action="{{route('games.update', $games)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $games->title) }}">
            @error('title')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="descrition" name="description" value="{{ old('description', $games->description) }}">
            @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $games->$url) }}">
            @error('url')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=0.01 class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $games->price) }}">
            @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">Genres</label>
            <input type="text" class="form-control @error('genres') is-invalid @enderror" id="genres" name="genres" value="{{ old('genres', $games->genres) }}">
            @error('genres')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="languages" class="form-label">Languages</label>
            <input type="text" class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages" value="{{ old('languages', $games->languages) }}">
            @error('languages')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor" value="{{ old('editor', $games->editor) }}">
            @error('editor')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="developer" class="form-label">Developer</label>
            <input type="text" class="form-control @error('developer') is-invalid @enderror" id="developer" name="developer" value="{{ old('developer', $games->developer) }}">
            @error('developer')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="release" class="form-label">Release</label>
            <input type="date" class="form-control @error('release') is-invalid @enderror" id="release" name="release" value="{{ old('release', $games->release) }}">
            @error('release')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="pegi" class="form-label">PEGI</label>
            <input type="text" class="form-control @error('pegi') is-invalid @enderror" id="pegi" name="pegi" value="{{ old('pegi', $games->pegi) }}">
            @error('pegi')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        </form>
    </div>
@endsection
