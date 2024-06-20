<?php

namespace App\Http\Controllers;


use App\Models\Theme;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $themes = Auth::user()->themes;
        return view('themes.index',compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('themes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:5|max:30',
        'codeColor' => 'required|string'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $theme = new Theme();
    $theme->name = $request->name;
    $theme->codeColor = $request->codeColor;
    $theme->user_id = Auth::id();
    $theme->save();

    // Ejemplo de obtención de una instancia de Library
    $library = Library::where('user_id', Auth::id())->first(); // Ajusta la lógica según tu necesidad

    // Verifica que $library no sea nulo antes de usarlo
    if ($library) {
        // Redirige a la creación de estanterías, asegurando que se pase el parámetro correcto
        return redirect()->route('shelves.create', ['library' => $library->id, 'theme' => $theme->id])
            ->with('success', 'Tema creado con éxito! Ahora crea una estantería.');
    } else {
        // Manejo de caso donde no se encuentra la biblioteca
        return redirect()->back()->with('error', 'No se encontró una biblioteca para asociar el tema.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        //
    }
}
