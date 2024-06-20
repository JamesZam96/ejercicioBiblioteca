@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Estanterías de la Biblioteca {{ $library->nombre }}</h1>
    <a href="{{ route('shelves.create', ['library' => $library->id, 'topic' => $topic->id]) }}" class="btn btn-success mb-3">Crear Nueva Estantería</a>

    @if ($shelves->isEmpty())
        <p>No hay estanterías creadas.</p>
    @else
        <ul class="list-group">
            @foreach ($shelves as $shelf)
                <li class="list-group-item">
                    <strong>Código:</strong> {{ $shelf->codigo }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
