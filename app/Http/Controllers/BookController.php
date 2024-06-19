<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Theme;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'theme')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $themes = Theme::all();
        return view('books.create', compact('authors', 'themes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'date' => 'required|date',
            'author_id' => 'required|exists:authors,id',
            'theme_id' => 'required|exists:themes,id',
        ]);

        $book = new Book();
        $book->name = $request->name;
        $book->date = $request->date;
        $book->author_id = $request->author_id;
        $book->theme_id = $request->theme_id;
        $book->save();

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $themes = Theme::all();
        return view('books.edit', compact('book', 'authors', 'themes'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'date' => 'required|date',
            'author_id' => 'required|exists:authors,id',
            'theme_id' => 'required|exists:themes,id',
        ]);

        $book->name = $request->name;
        $book->date = $request->date;
        $book->author_id = $request->author_id;
        $book->theme_id = $request->theme_id;
        $book->save();

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
