@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Biblioteca</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $library->name }}</h5>
            <p class="card-text"><strong>Ubicación:</strong> {{ $library->location }}</p>
            @if($library->description)
                <p class="card-text"><strong>Descripción:</strong> {{ $library->description }}</p>
            @endif
            <a href="{{ route('libraries.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
