@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Biblioteca</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('libraries.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" class="form-control" required minlength="5" maxlength="30" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="location">Ubicación:</label>
            <input type="text" id="location" name="location" class="form-control" required minlength="20" maxlength="125" value="{{ old('location') }}">
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" class="form-control" maxlength="500">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Biblioteca</button>
    </form>
</div>
@endsection
