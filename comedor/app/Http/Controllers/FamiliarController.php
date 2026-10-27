<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Familiar;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $familiares = Familiar::all();

    return view('familiares.index', compact('familiares'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
{
    $empleados = Empleado::all();

    return view(
        'familiares.create',
        compact('empleados')
    );
}

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            Familiar::create([

                'empleado_id' => $request->empleado_id,
                'codigo'      => $request->codigo,
                'nombre'      => $request->nombre,
                'parentesco'  => $request->parentesco,
                'estado'      => $request->estado,

            ]);

            return redirect()
                ->route('familiares.index')
                ->with('success', 'Familiar registrado correctamente');
        }
    /**
     * Display the specified resource.
     */
    public function show(Familiar $familiar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Mostrar formulario de edición
    public function edit(Familiar $familiar)
    {
        return view('familiares.edit', compact('familiar'));
    }

    // Actualizar el familiar en la BD
    public function update(Request $request, Familiar $familiar)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:familiares,codigo,' . $familiar->id,
            'nombre' => 'required|string|max:255',
            'parentesco' => 'required|string|max:100',
            'estado' => 'required|string|in:Activo,Inactivo',
        ]);

        $familiar->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'parentesco' => $request->parentesco,
            'estado' => $request->estado,
        ]);

        return redirect()->route('empleados.show', $familiar->empleado_id)
                         ->with('success', 'Familiar actualizado correctamente.');
    }

    /**
     * Update the specified resource in storage.
     */
  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familiar $familiar)
    {
        //
    }



}
