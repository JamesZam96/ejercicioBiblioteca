@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Biblioteca</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $library->nombre }}</h5>
            <p class="card-text"><strong>Ubicación:</strong> {{ $library->ubicacion }}</p>
            @if($library->descripcion)
                <p class="card-text"><strong>Descripción:</strong> {{ $library->descripcion }}</p>
            @endif
            <a href="{{ route('libraries.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
