@extends('layouts.app')

@section('content')
<div>
    <h1>Temas</h1>
    <a href="{{ route('themes.create') }}">Create Product</a>
    <ul>
        @foreach ($themes as $theme)
            <li>{{ $theme->name }} - {{ $theme->codeColor }}</li>
        @endforeach
    </ul>
</div>

@endsection