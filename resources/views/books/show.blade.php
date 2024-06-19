<div class="container">
        <h1>{{ $book->name }}</h1>
        <p>Date: {{ $book->date }}</p>
        <p>Author: {{ $book->author->name }}</p>
        <p>Theme: {{ $book->theme->name }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </div>