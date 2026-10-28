<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class EmpleadoController extends Controller
{
  public function index()
    {
        $empleados = User::where('role','empleado')->get();

        return view('empleados.index', compact('empleados'));
    }

     public function create()
    {
        return view('empleados.create');
    }

    public function edit($id)
    {
        $empleado = User::findOrFail($id);

        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, User $empleado)
{
    $request->validate([
        'codigo' => 'required|string|max:50|unique:users,codigo,' . $empleado->id,
        'nombres' => 'required|string|max:30',
        'apellidos' => 'required|string|max:30',
        'correo' => 'required|email|max:50|unique:users,email,' . $empleado->id,
        'ci' => 'required|string|max:50|unique:users,ci,' . $empleado->id,
        'telefono' => 'nullable|string',
        'area' => 'required|string',
        'cargo' => 'required|string',
        'fecha_ingreso' => 'required|date',
        'credito_disponible' => 'required|numeric|min:0',
        'estado' => 'required|string',
        'password' => 'nullable|string|min:4', 
    ]);

    $datosAActualizar = [
        'codigo' => $request->codigo,
        'name' => $request->nombres,
        'lastname' => $request->apellidos,
        'email' => $request->correo,
        'ci' => $request->ci,
        'telefono' => $request->telefono,
        'area' => $request->area,
        'cargo' => $request->cargo,
        'fecha_ingreso' => $request->fecha_ingreso,
        'credito_disponible' => $request->credito_disponible,
        'estado' => $request->estado,
    ];

    if ($request->filled('password')) {
        $datosAActualizar['password'] = Hash::make($request->password);
    }

    $empleado->update($datosAActualizar);

    return redirect()->route('empleados.index')->with('success', 'Empleado actualizado correctamente');
}

      public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('empleados.index');
    }

public function store(Request $request)
{
    $request->validate([
        'codigo' => 'required|string|unique:users,codigo|max:50',
        'nombres' => 'required|string|max:30',    
        'apellidos' => 'required|string|max:30',
        'correo' => 'required|email|unique:users,email|max:50',
        'ci' => 'required|string|unique:users,ci|max:50',
        'telefono' => 'nullable|string',
        'area' => 'required|string',          
        'cargo' => 'required|string',   
        'fecha_ingreso' => 'required|date',  
        'credito_disponible' => 'required|numeric|min:0',
        'estado' => 'required|string'
    ]);

    User::create([
        'codigo' => $request->codigo,
        'name' => $request->nombres,
        'lastname' => $request->apellidos,
        'ci' => $request->ci,
        'email' => $request->correo,
        'telefono' => $request->telefono,
        'area' => $request->area,
        'cargo' => $request->cargo,
        'fecha_ingreso' => $request->fecha_ingreso,
        'credito_disponible' => $request->credito_disponible,
        'estado' => $request->estado,
        'password' => Hash::make('123456')
    ]);

    return redirect()
        ->route('empleados.index')
        ->with('success', 'Empleado creado correctamente');
}


}