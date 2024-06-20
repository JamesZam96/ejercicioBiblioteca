@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Bibliotecas</h1>
    <a href="{{ route('libraries.create') }}" class="btn btn-primary mb-3">Crear Nueva Biblioteca</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libraries as $library)
                <tr>
                    <td>{{ $library->name }}</td>
                    <td>{{ $library->location }}</td>
                    <td>
                        <a href="{{ route('libraries.show', $library->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('libraries.edit', $library->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('libraries.destroy', $library->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta biblioteca?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
