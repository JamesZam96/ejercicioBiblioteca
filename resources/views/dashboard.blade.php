@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}!</p>
    <a href="{{ route('libraries.index') }}" class="btn btn-danger">Administrar Bibliotecas</a>
    <br>
    <br>
    <a href="{{ route('books.search.form') }}" class="btn btn-danger">Buscar libro</a>
</div>

@endsection
