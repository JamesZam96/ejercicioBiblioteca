@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Theme</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if($books && count($books) > 0)
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->date }}</td>
                        <td>{{ $book->author ? $book->author->name : 'No author' }}</td>
                        <td>{{ $book->theme ? $book->theme->name : 'No theme' }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-info">View</a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
            <tr>
        <td colspan="5">No books available.</td>
        </tr>
                @endif
            </tbody>
        </table>
    </div>
    @endsection