@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear tema</h1>
        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('themes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="codeColor" class="form-label">Codigo de color</label>
            <input type="text" class="form-control" id="codeColor" name="codeColor" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear tema</button>


    </form>
    </div>
@endsection
