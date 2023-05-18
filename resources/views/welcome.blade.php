@extends('layouts.app')

@section('page.main')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to the Laravel Boostrap Auth Template') }}</div>

                <div class="card-body">
                    Click on login or register in the menu to get started :)
                    <div>
                        <a class="mt-2 btn btn-primary" href="{{ route('games.index') }}">To the games list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
