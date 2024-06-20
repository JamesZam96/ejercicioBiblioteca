@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Books</h1>
    <form action="{{ route('books.search') }}" method="POST" class="form-inline mb-3">
        @csrf
        <input type="search" name="query" class="form-control" placeholder="Search for books">
        <button type="submit" class="btn btn-primary ml-2">Search</button>
    </form>
</div>
@endsection
