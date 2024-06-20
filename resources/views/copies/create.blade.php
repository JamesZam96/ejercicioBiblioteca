@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Copia Del Libro</h1>
    <form action="{{ route('copies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="numCopy">Numero de copia</label>
            <input type="number" class="form-control" id="numCopy" name="numCopy" required>
        </div>
        <div class="form-group">
            <label for="book_id">Libro</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">
                        {{ $book->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="shelf_id">Estanteria</label>
            <select class="form-control" id="shelf_id" name="shelf_id" required>
                @foreach($shelves as $shelf)
                    <option value="{{ $shelf->id }}">{{ $shelf->code }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <form action="{{ route('dashboard') }}" method="GET" style="margin-top: 10px;">
        <button type="submit" class="btn btn-secondary">Omitir</button>
    </form>
</div>
@endsection
