<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
  public function index()
    {
        $empleados = Empleado::all();

        return view('empleados.index', compact('empleados'));
    }

     public function create()
    {
        return view('empleados.create');
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);

        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->update($request->all());

        return redirect()->route('empleados.index');
    }

      public function destroy($id)
    {
        Empleado::findOrFail($id)->delete();

        return redirect()->route('empleados.index');
    }

    public function store(Request $request)
{
    Empleado::create([
        'codigo' => $request->codigo,
        'nombres' => $request->nombres,
        'apellidos' => $request->apellidos,
        'ci' => $request->ci,
        'correo' => $request->correo,
        'telefono' => $request->telefono,
        'area' => $request->area,
        'cargo' => $request->cargo,
        'fecha_ingreso' => $request->fecha_ingreso,
        'credito_disponible' => $request->credito_disponible,
        'estado' => $request->estado,
    ]);

    return redirect()
        ->route('empleados.index')
        ->with('success', 'Empleado registrado correctamente');
}




}