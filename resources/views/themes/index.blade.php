@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Temas</h1>
                <a href="{{ route('themes.create') }}" class="btn btn-primary mb-3">Crear tema</a>
                <ul class="list-group">
                    @foreach ($themes as $theme)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $theme->name }}</span>
                            <span class="badge badge-primary">{{ $theme->codeColor }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection