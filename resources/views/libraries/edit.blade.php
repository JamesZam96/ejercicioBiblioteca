@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Biblioteca</h1>
    <form action="{{ route('libraries.update', $library->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required minlength="5" maxlength="30" value="{{ $library->nombre }}">
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" required minlength="20" maxlength="125" value="{{ $library->ubicacion }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" maxlength="500">{{ $library->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Biblioteca</button>
    </form>
</div>
@endsection
