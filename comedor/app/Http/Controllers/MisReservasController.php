<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Familiar;

class MisReservasController extends Controller
{
    public function index()
    {
        $empleado = Empleado::find(1); // temporal para pruebas

        $familiares = Familiar::where(
            'empleado_id',
            $empleado->id
        )->where(
            'estado',
            'Activo'
        )->get();

        return view(
            'mis-reservas.index',
            compact(
                'empleado',
                'familiares'
            )
        );
    }  

}
