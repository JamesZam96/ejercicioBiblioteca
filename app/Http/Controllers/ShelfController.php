<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use App\Models\Library;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShelfController extends Controller
{
    public function create(Library $library, Theme $theme)
    {
        return view('shelves.create', compact('library', 'theme'));
    }

    public function store(Request $request, Library $library, Theme $theme)
    {
        // Validar la solicitud para la creación de la estantería
        $request->validate([
            'codigo' => 'required|string|max:10',
        ]);

        // Crear una nueva estantería
        $shelf = new Shelf([
            'code' => $request->code,
            'theme_id' => $theme->id,
            'library_id' => $library->id,
            'user_id' => Auth::id(),
        ]);

        // Guardar la estantería
        $shelf->save();

        return redirect()->route('authors.create', [
            'library' => $library->id,
            'theme' => $theme->id,
            'shelf' => $shelf->id,
        ])->with('success', 'Estantería creada con éxito. Ahora crea un autor.');
    }

    public function index(Library $library, Theme $theme)
    {
        // Obtener todas las estanterías asociadas al tema y la biblioteca específicos
        $shelves = Shelf::where('library_id', $library->id)
                        ->where('theme_id', $theme->id)
                        ->get();

        return view('shelves.index', compact('library', 'theme', 'shelves'));
    }

    public function show(Library $library, Theme $theme, Shelf $shelf)
    {
        // Asegúrate de que el usuario actual es el propietario de la biblioteca
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        // Verifica si la estantería pertenece al tema y biblioteca especificados
        if ($shelf->library_id != $library->id || $shelf->theme_id != $theme->id) {
            abort(404);
        }

        return view('shelves.show', compact('library', 'theme', 'shelf'));
    }

    public function edit(Library $library, Theme $theme, Shelf $shelf)
    {
        // Asegúrate de que el usuario actual es el propietario de la biblioteca
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        // Verifica si la estantería pertenece al tema y biblioteca especificados
        if ($shelf->library_id != $library->id || $shelf->theme_id != $theme->id) {
            abort(404);
        }

        return view('shelves.edit', compact('library', 'theme', 'shelf'));
    }

    public function update(Request $request, Library $library, Theme $theme, Shelf $shelf)
    {
        // Validar la solicitud
        $request->validate([
            'codigo' => 'required|string|max:10',
        ]);

        // Asegúrate de que el usuario actual es el propietario de la biblioteca
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        // Verifica si la estantería pertenece al tema y biblioteca especificados
        if ($shelf->library_id != $library->id || $shelf->theme_id != $theme->id) {
            abort(404);
        }

        // Actualizar la estantería
        $shelf->update([
            'code' => trim($request->codigo),
        ]);

        return redirect()->route('shelves.index', ['library' => $library->id, 'theme' => $theme->id])
                        ->with('success', 'Estantería actualizada con éxito.');
    }

    public function destroy(Library $library, Theme $theme, Shelf $shelf)
    {
        // Asegúrate de que el usuario actual es el propietario de la biblioteca
        if ($library->user_id != Auth::id()) {
            abort(403);
        }

        // Verifica si la estantería pertenece al tema y biblioteca especificados
        if ($shelf->library_id != $library->id || $shelf->theme_id != $theme->id) {
            abort(404);
        }

        // Eliminar la estantería
        $shelf->delete();

        return redirect()->route('shelves.index', ['library' => $library->id, 'theme' => $theme->id])
                        ->with('success', 'Estantería eliminada con éxito.');
    }
}
