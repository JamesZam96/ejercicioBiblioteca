@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    @if($results->isEmpty())
        <p>No books found for your query: {{ $query }}</p>
    @else
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Library</th>
                    <th>Copies</th>
                    <th>Shelf</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->book->name }}</td>
                        <td>{{ $result->library->name }}</td>
                        <td>{{ $result->copies }}</td>
                        <td>{{ $result->shelf }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ route('books.search.form') }}" class="btn btn-secondary mt-3">Back to Search</a>
</div>
@endsection
