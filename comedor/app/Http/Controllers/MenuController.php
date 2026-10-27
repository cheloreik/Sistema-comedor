<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    $menus = Menu::all();

    return view(
        'menus.index',
        compact('menus')
    );
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Menu::create([

            'fecha' => $request->fecha,
            'cupo_disponible' => $request->cupo_disponible,
            'plato_principal' => $request->plato_principal,
            'guarnicion' => $request->guarnicion,
            'ensalada' => $request->ensalada,
            'bebida' => $request->bebida,
            'postre' => $request->postre,
            'estado' => 'Borrador'

        ]);

        return redirect()
            ->route('menus.index')
            ->with(
                'success',
                'Menú registrado correctamente'
            );
    }
    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
