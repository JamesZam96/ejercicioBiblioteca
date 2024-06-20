<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Auth::user()->authors;
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $users = User::all();
        return view('authors.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:45',
            'biography' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $author = new Author();
        $author->name = $request->name;
        $author->biography = $request->biography;
        $author->user_id = Auth::id(); // Asigna el ID del usuario autenticado
        $author->save();

        return redirect()->route('books.create')->with('success', 'Autor creado exitosamente. Ahora crea un libro.');
    }

    public function show(Author $author)
    {
        // No es necesario implementar por ahora
    }

    public function edit(Author $author)
    {
        // No es necesario implementar por ahora
    }

    public function update(Request $request, Author $author)
    {
        // No es necesario implementar por ahora
    }

    public function destroy(Author $author)
    {
        // No es necesario implementar por ahora
    }
}
