<?php

namespace App\Http\Controllers;

use App\Models\Theme;
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
        //
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:5|max:30',
            'codeColor' => 'require|string'
        ]);

        /*Theme::create([
            'name' => $request->name,
            'codeColor' => $request->codeColor,
            'user_id' => $request->user_id
        ]);*/
        $theme = new Theme();
        $theme->name = $request->name;
        $theme->codeColor = $request->codeColor;
        $theme->user_id = Auth::id(); // Asignar ID del usuario autenticado
        $theme->save();
        return response('Tema creado satisfactoriamente');
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
