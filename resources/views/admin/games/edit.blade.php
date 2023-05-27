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

        <form action="{{route('admin.games.update', $game)}}" method="POST" enctype="multipart/form-data" class="form-input-image">
        @csrf
        @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $game->title) }}">
                @error('title')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div>

            {{-- <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $game->description) }}">
                @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
            </div> --}}

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
            
             {{-- image holder  --}}


             <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="set_image" name="set_image" value="1" @if($game->image) checked @endif>
                <label class="form-check-label" for="set_image">Upload Image?</label>
            </div>
            <div class="mb-3 @if(!$game->image) d-none @endif"  id="image-input-container">
                <!-- upload preview -->
                <div class="preview">
                    <img id="file-image-preview" @if($game->image) src="{{ asset('storage/' . $game->image) }}" @endif>
                </div>
                <!-- /upload preview -->
    
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

          {{-- <div class="mb-3 @if(!$game->image) d-none @endif"  id="image-input-container">

                <!-- Img Preview -->
                <div class="preview">
                    <img id="file-image-preview" @if($game->image) src="{{ asset('storage/' . $game->image) }}" @endif>
                </div>
                <!-- /Img Preview -->


                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
          </div> --}}

        {{-- image holder  --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection
