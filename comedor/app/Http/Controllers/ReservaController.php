<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Menu;
use App\Models\Reserva;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::where('fecha','>=',now()->toDateString())->get();
        return view('reservas.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reservable_id' => 'required|integer',
            'reservable_type' => 'required|string',
            'plato_id' => 'required|exists:menus,id',
            'fecha' => 'required|date',
        ]);

        Reserva::create([
            'reservable_id' => $request->reservable_id,
            'reservable_type' => $request->reservable_type,
            'plato_id' => $request->plato_id,
            'fecha' => $request->fecha,
            'estado' => 'reservado', 
        ]);

        return back()->with('success', '¡Reserva realizada con éxito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return back()->with('success', 'Reserva cancelada con éxito.');
    }

    public function lista($id)
    {
        $menu = Menu::findOrFail($id);

        $limite = Carbon::parse($menu->fecha)->setTime(9, 0, 0);
            if (Carbon::now()->lessThanOrEqualTo($limite)) {
                $empleado = Auth::user(); 
                $familiares = Familiar::where('estado', 'activo')->where('empleado_id', $empleado->id)->get();

                return view('reservas.lista', compact('menu','empleado', 'familiares'));
                

            } else {
                return redirect()->route('reservas.index')->with('error', '¡ya no esta disponible reservar o cancelar reserva !');
            }
        
    }

    public function cancelar(Reserva $reserva)
    {
        $reserva->update(['estado' => 'cancelado']);
        
        return back()->with('success', 'Reserva cancelada.');
    }

    public function entregar(Reserva $reserva)
    {
        $reserva->update(['estado' => 'entregado']);
        
        return back()->with('success', 'Plato entregado con éxito.');
    }
}
