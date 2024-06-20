<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shelf;
use App\Models\Copy;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index()
    {
        $copies = Copy::with('book', 'shelf')->get();
        return view('copies.index', compact('copies'));
    }

    public function create(Request $request)
    {
        $books = Book::all();
        $shelves = Shelf::all();
        $book_id = $request->get('book_id');
        return view('copies.create', compact('books', 'shelves', 'book_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'copy_num' => 'required|integer',
            'book_id' => 'required|exists:books,id',
            'shelf_id' => 'required|exists:shelves,id',
        ]);

        $copy = new Copy();
        $copy->copy_num = $request->copy_num;
        $copy->book_id = $request->book_id;
        $copy->shelf_id = $request->shelf_id;
        $copy->save();

        return redirect()->route('dashboard')->with('success', 'Copia creada exitosamente.');
    }

    public function show(Copy $copy)
    {
        return view('copies.show', compact('copy'));
    }

    public function edit(Copy $copy)
    {
        $books = Book::all();
        $shelves = Shelf::all();
        return view('copies.edit', compact('copy', 'books', 'shelves'));
    }

    public function update(Request $request, Copy $copy)
    {
        $request->validate([
            'copy_num' => 'required|integer',
            'book_id' => 'required|exists:books,id',
            'shelf_id' => 'required|exists:shelves,id',
        ]);

        $copy->copy_num = $request->copy_num;
        $copy->book_id = $request->book_id;
        $copy->shelf_id = $request->shelf_id;
        $copy->save();

        return redirect()->route('copies.index');
    }

    public function destroy(Copy $copy)
    {
        $copy->delete();
        return redirect()->route('copies.index');
    }
}
