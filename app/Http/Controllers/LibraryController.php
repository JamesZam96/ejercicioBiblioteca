<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function dashboard()
    {
        $libraries = Library::where('user_id', Auth::id())->get();
        return view('dashboard', compact('libraries'));
    }

    public function index()
    {
        $libraries = Library::where('user_id', Auth::id())->get();
        return view('libraries.index', compact('libraries'));
    }

    public function create()
    {
        return view('libraries.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|min:5|max:30',
        'ubicacion' => 'required|string|min:20|max:125',
        'descripcion' => 'nullable|string|max:500',
    ]);

    $library = Library::create([
        'name' => $request->nombre,
        'location' => $request->ubicacion,
        'description' => $request->descripcion,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('themes.create', ['library' => $library->id])->with('success', 'Biblioteca creada con éxito! Ahora crea un tema.');
}


    public function show(Library $library)
    {
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        return view('libraries.show', compact('library'));
    }

    public function edit(Library $library)
    {
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        return view('libraries.edit', compact('library'));
    }

    public function update(Request $request, Library $library)
    {
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|min:5|max:30',
            'ubicacion' => 'required|string|min:20|max:125',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $library->update([
            'name' => trim($request->nombre),
            'location' => trim($request->ubicacion),
            'description' => $request->descripcion ? trim($request->descripcion) : null,
        ]);

        return redirect()->route('libraries.index')->with('success', 'Biblioteca actualizada con éxito!');
    }

    public function destroy(Library $library)
    {
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        $library->delete();

        return redirect()->route('libraries.index')->with('success', 'Biblioteca eliminada con éxito!');
    }
}
