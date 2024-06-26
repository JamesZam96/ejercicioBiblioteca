@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Estantería para {{ $library->nombre }}</h1>
    <form action="{{ route('shelves.store', ['library' => $library->id, 'theme' => $theme->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Código:</label>
            <input type="text" id="code" name="code" class="form-control" required maxlength="10">
        </div>
        <button type="submit" class="btn btn-primary">Crear Estantería</button>
    </form>
</div>
@endsection
