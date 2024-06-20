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
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required minlength="5" maxlength="30" value="{{ old('nombre') }}">
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" required minlength="20" maxlength="125" value="{{ old('ubicacion') }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" maxlength="500">{{ old('descripcion') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Biblioteca</button>
    </form>
</div>
@endsection
