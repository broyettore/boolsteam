@extends('layouts.app')

@section('title')
    <div class="container">
        <h1>MODIFICA ELEMENTO</h1>
    </div>
@endsection

@section('page.main')

    <div class="container">
        <a href="{{ route('admin.games.index') }}" class="m-5 btn btn-primary">Torna alla lista</a>
        <H1>Modifica Elemento: {{$game->title}}</H1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('admin.games.update', $game)}}" method="POST">
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
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url', $game->url) }}">
                @error('url')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step=0.01 class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $game->price) }}">
                @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label for="languages" class="form-label">Languages</label>
                <input type="text" class="form-control @error('languages') is-invalid @enderror" id="languages" name="languages" value="{{ old('languages', $game->languages) }}">
                @error('languages')<div class="alert alert-danger">{{ $message }}</div>@enderror
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
            <div class="mb-3">
            <label class="form-label" for="editors">Editor:</label>
              <select class="form-select" id="editors" name="editor_id">
                  <option selected value="">Select the editor</option>
                  @foreach ($editors as $editor)
                      <option value="{{$editor->id}}" {{old('editor_id',$game->editor_id) == $editor->id ? 'selected' : ''}}>{{$editor->name}}</option>
                  @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h6 class="mb-3">Genres</h6>
                @foreach($genres as $genre)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="genres" value="{{$genre->id}}" name="genres[]" {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="genres">{{$genre->title}}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
