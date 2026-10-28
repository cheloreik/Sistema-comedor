<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
    {
        $menus = Menu::latest()->limit(31)->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => [
                    'required','unique:menus,fecha',
                    'date',
                    function ($attribute, $value, $fail) {
                        $fecha = Carbon::parse($value);
                        if ($fecha->isWeekend()) {
                            $fail('El menú solo puede ser programado de lunes a viernes.');
                        }
                    },
                ],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
            'plato' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'adicional' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        $datos = $request->all();

        if ($request->hasFile('foto')) {
            $datos['foto'] = $request->file('foto')->store('menus', 'public');
        }

        Menu::create($datos);

        return redirect()->route('menus.index')->with('success', 'Menú creado correctamente');
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'fecha' => [
                    'required',
                    'date',
                    function ($attribute, $value, $fail) {
                        $fecha = Carbon::parse($value);
                        if ($fecha->isWeekend()) {
                            $fail('El menú solo puede ser programado de lunes a viernes.');
                        }
                    },
                ],
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'plato' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'adicional' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        $datos = $request->all();
        if ($request->hasFile('foto')) {
            if ($menu->foto && Storage::disk('public')->exists($menu->foto)) {
                Storage::disk('public')->delete($menu->foto);
            }
            $datos['foto'] = $request->file('foto')->store('menus', 'public');
        } else {
            $datos['foto'] = $menu->foto;
        }

        $menu->update($datos);

        return redirect()->route('menus.index')->with('success', 'Menú actualizado correctamente');
    }

    public function destroy(Menu $menu)
    {
        if($menu->fecha <= now()->toDateString() && $menu->estado=="Publicado"){
            return redirect()->route('menus.index')->with('error', 'No se puede Borrar este menu porque fue publicado.');
        }
        
        if ($menu->foto && Storage::disk('public')->exists($menu->foto)) {
            Storage::disk('public')->delete($menu->foto);
        }
        
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menú eliminado correctamente');
    }
}
