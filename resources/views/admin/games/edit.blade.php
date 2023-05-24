@extends('layouts.app')

@section('title')
    <div class="container py-2">
        <h1>MODIFICA ELEMENTO</h1>
    </div>
@endsection

@section('page.main')

    <div class="container py-3">
        <a href="{{ route('admin.games.index') }}" class="mb-3 btn btn-primary">Torna alla lista</a>
        <H1>Modifica Elemento: {{$game->title}}</H1>

        @include('partials.errors')
        
        <form action="{{route('admin.games.update', $game->id)}}" method="POST" enctype="multipart/form-data" class="form-input-image">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $game->title) }}">
            @error('title')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="descrition" name="description" value="{{ old('description', $game->description) }}">
            @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=0.01 class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $game->price) }}">
            @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">Genres</label>
            <input type="text" class="form-control @error('genres') is-invalid @enderror" id="genres" name="genres" value="{{ old('genres', $game->genres) }}">
            @error('genres')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="languages" class="form-label">Languages</label>
            <input type="text" class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages" value="{{ old('languages', $game->languages) }}">
            @error('languages')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor" value="{{ old('editor', $game->editor) }}">
            @error('editor')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="developer" class="form-label">Developer</label>
            <input type="text" class="form-control @error('developer') is-invalid @enderror" id="developer" name="developer" value="{{ old('developer', $game->developer) }}">
            @error('developer')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="release" class="form-label">Release</label>
            <input type="date" class="form-control @error('release') is-invalid @enderror" id="release" name="release" value="{{ old('release', $game->release) }}">
            @error('release')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="pegi" class="form-label">PEGI</label>
            <input type="text" class="form-control @error('pegi') is-invalid @enderror" id="pegi" name="pegi" value="{{ old('pegi', $game->pegi) }}">
            @error('pegi')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>

        {{-- image holder  --}}

        <div class="mb-3 @if(!$game->image) d-none @endif"  id="image-input-container">
            
            <!-- Img Preview -->
            <div class="preview">
                <img id="file-image-preview" @if($game->image) src="{{ asset('storage/' . $game->image) }}" @endif>
            </div>
            <!-- /Img Preview -->
            
            
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>

        {{-- image holder  --}}

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
