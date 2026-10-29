<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Familiar;
use App\Models\User;
use Illuminate\Http\Request;

class FamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $familiares = Familiar::with('empleado')->get();
        return view('familiares.index', compact('familiares'));
    }

    public function create()
    {
        $empleados = User::where('estado','activo')->where('role','empleado')->get();
        return view('familiares.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:users,id',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'required|string|max:50|unique:familiares,ci',
            'parentesco' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Familiar::create($request->all());

        return redirect()->route('familiares.index')->with('success', 'Familiar registrado con éxito.');
    }

    public function edit(Familiar $familiare) // O $familiar
    {
        $empleados = User::all();
        $familiar = $familiare; // Alias por claridad
        return view('familiares.edit', compact('familiar', 'empleados'));
    }

    public function update(Request $request, Familiar $familiare)
    {
        $request->validate([
            'empleado_id' => 'required|exists:users,id',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => 'required|string|max:50|unique:familiares,ci,' . $familiare->id,
            'parentesco' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $familiare->update($request->all());

        return redirect()->route('familiares.index')->with('success', 'Familiar actualizado con éxito.');
    }

    public function destroy(Familiar $familiare)
    {
        $familiare->delete();
        return redirect()->route('familiares.index')->with('success', 'Familiar eliminado correctamente.');
    }



}
