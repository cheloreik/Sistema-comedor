<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Reserva;
use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function index()
    {
        $menus = Menu::where('fecha','>=',now()->toDateString())->get();
        return view('entregas.index',compact('menus'));
    }
    public function update(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        if ($reserva->estado == 'cancelado') {
            return back()->with('error', 'No se puede entregar una reserva cancelada.');
        }
        $reserva->update([
            'estado' => 'entregado'
        ]);
        return back()->with('success', '¡Comida entregada con éxito! Esta acción es definitiva.');
    }

    public function lista($id)
    {
        $menu = Menu::findOrFail($id);
        $reservas = Reserva::where('plato_id', $menu->id)
            ->where('estado', '!=', 'cancelado') 
            ->with('reservable')
            ->get();

        return view('entregas.lista', compact('menu', 'reservas'));
    }
    public function entregar(Reserva $reserva)
    {
        if ($reserva->estado == 'cancelado') {
            return back()->with('error', 'No se puede entregar una reserva cancelada.');
        }
        $reserva->update([
            'estado' => 'entregado'
        ]);

        return back()->with('success', '¡Comida entregada con éxito! Esta acción es definitiva.');
    }
}
