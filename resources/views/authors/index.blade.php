@extends('layouts.app')

@section('content')
<div>
    <h1>Autores</h1>
    <a href="{{ route('authors.create') }}">Create Autor</a>
    <ul>
        @foreach ($authors as $author)
            <li>{{ $author->name }} - {{ $author->biography}}</li>
        @endforeach
    </ul>
</div>

@endsection
