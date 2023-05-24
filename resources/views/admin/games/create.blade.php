@extends('layouts.app')

@section('title')
    <div class="container py-2">
        <h1>INSERISCI I DATI:</h1>
    </div>
@endsection

@section('page.main')

    <div class="container py-3">
        <a href="{{ route('admin.games.index') }}" class="mb-3 btn btn-primary">Torna alla lista</a>

        <div>
            @include('partials.errors')
        </div>

        <form action="{{ route('admin.games.store') }}" method="post" enctype="multipart/form-data" class="form-input-image">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step=0.01 class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">Genres</label>
            <input type="text" class="form-control" id="genres" name="genres" value="{{ old('genres') }}">
        </div>
        <div class="mb-3">
            <label for="languages" class="form-label">Languages</label>
            <input type="text" class="form-control" id="languages" name="languages" value="{{ old('languages') }}">
        </div>
        <div class="mb-3">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control" id="editor" name="editor" value="{{ old('editor') }}">
        </div>
        <div class="mb-3">
            <label for="developer" class="form-label">Developer</label>
            <input type="text" class="form-control" id="developer" name="developer" value="{{ old('developer') }}">
        </div>
        <div class="mb-3">
            <label for="release" class="form-label">Release</label>
            <input type="date" class="form-control" id="release" name="release" value="{{ old('release') }}">
        </div>
        <div class="mb-3">
            <label for="pegi" class="form-label">PEGI</label>
            <input type="text" class="form-control" id="pegi" name="pegi" value="{{ old('pegi') }}">
        </div>

        {{-- image holder   --}}

        <div class="mb-3">
            
            <!-- Img Preview -->
            <div class="preview">
                <img id="file-image-preview">
            </div>
            <!-- /Img Preview -->
            
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image" value="{{ old("image") }}">
        </div>

        {{-- image holder   --}}

        <div class="mb-3">
            <input type="submit" value="submit" class="btn btn-primary">
        </div>
        </form>
    </div>
@endsection
