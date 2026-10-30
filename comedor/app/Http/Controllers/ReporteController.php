<?php

namespace App\Http\Controllers;

use App\Models\Familiar;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
     
    public function index()
    {
        $empleados = User::where('role', 'empleado')->get();
        return view('reportes.reservas', compact('empleados'));
    }

    public function filtrar(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $empleadoId = $request->input('empleado_id');
        $estado = $request->input('estado'); 

        $query = Reserva::with(['reservable', 'plato'])
            ->whereBetween('fecha', [$fechaInicio, $fechaFin]);

        if (!empty($estado)) {
            $query->where('estado', $estado);
        }

        if (!empty($empleadoId)) {
            $familiarIds = Familiar::where('empleado_id', $empleadoId)->pluck('id');

            $query->where(function($q) use ($empleadoId, $familiarIds) {
                $q->where(function($sub) use ($empleadoId) {
                    $sub->where('reservable_type', User::class)
                        ->where('reservable_id', $empleadoId);
                });

                if ($familiarIds->isNotEmpty()) {
                    $q->orWhere(function($sub) use ($familiarIds) {
                        $sub->where('reservable_type', Familiar::class)
                            ->whereIn('reservable_id', $familiarIds);
                    });
                }
            });
        }

        $reservas = $query->get();

        $resultado = $reservas->map(function ($reserva) {
            $esFamiliar = $reserva->reservable_type === Familiar::class;
            
            $nombreBeneficiario = '';
            $parentesco = 'Titular';

            if ($esFamiliar && $reserva->reservable) {
                $nombreBeneficiario = $reserva->reservable->nombres . ' ' . $reserva->reservable->apellidos;
                $parentesco = ucfirst($reserva->reservable->parentesco);
            } elseif ($reserva->reservable) {
                $nombreBeneficiario = $reserva->reservable->name . ' ' . $reserva->reservable->lastname;
                $parentesco = 'Titular';
            }

            return [
                'id' => $reserva->id,
                'fecha' => $reserva->fecha,
                'plato' => $reserva->plato->plato ?? 'Plato no especificado',
                'beneficiario' => $nombreBeneficiario,
                'parentesco' => $parentesco,
                'estado' => $reserva->estado,
                'cantidad' => 1
            ];
        });

        return response()->json($resultado);
    }

    private function obtenerQueryFiltrada(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $empleadoId = $request->input('empleado_id');
        $estado = $request->input('estado');

        $query = Reserva::with(['reservable', 'plato'])
            ->whereBetween('fecha', [$fechaInicio, $fechaFin]);

        if (!empty($estado)) {
            $query->where('estado', $estado);
        }

        if (!empty($empleadoId)) {
            $familiarIds = \App\Models\Familiar::where('empleado_id', $empleadoId)->pluck('id');

            $query->where(function($q) use ($empleadoId, $familiarIds) {
                $q->where(function($sub) use ($empleadoId) {
                    $sub->where('reservable_type', User::class)
                        ->where('reservable_id', $empleadoId);
                });

                if ($familiarIds->isNotEmpty()) {
                    $q->orWhere(function($sub) use ($familiarIds) {
                        $sub->where('reservable_type', Familiar::class)
                            ->whereIn('reservable_id', $familiarIds);
                    });
                }
            });
        }

        return $query->get();
    }

    public function exportarExcel(Request $request)
    {
        $reservas = $this->obtenerQueryFiltrada($request);

        $filename = "reporte_reservas_" . date('Y-m-d_H-i-s') . ".csv";
        
        $headers = [
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ($reservas) {
            $file = fopen('php://output', 'w');
            // Forzar UTF-8 BOM para Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Cabeceras CSV
            fputcsv($file, ['ID', 'Fecha', 'Plato', 'Beneficiario', 'Parentesco', 'Estado', 'Cantidad'], ';');

            foreach ($reservas as $reserva) {
                $esFamiliar = $reserva->reservable_type === Familiar::class;
                $beneficiario = $esFamiliar 
                    ? $reserva->reservable->nombres . ' ' . $reserva->reservable->apellidos 
                    : ($reserva->reservable->name . ' ' . $reserva->reservable->lastname ?? '');
                $parentesco = $esFamiliar ? ucfirst($reserva->reservable->parentesco) : 'Titular';

                fputcsv($file, [
                    $reserva->id,
                    $reserva->fecha,
                    $reserva->plato->plato ?? 'N/A',
                    $beneficiario,
                    $parentesco,
                    $reserva->estado,
                    1
                ], ';');
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportarPdf(Request $request)
    {
        // Si usas barryvdh/laravel-dompdf puedes retornar una vista en PDF:
        // $reservas = $this->obtenerQueryFiltrada($request);
        // $pdf = \PDF::loadView('reportes.reservas_pdf', compact('reservas'));
        // return $pdf->download('reporte_reservas.pdf');
        
        // Mensaje temporal si no tienes DomPDF instalado aún:
        return back()->with('error', 'Instale barryvdh/laravel-dompdf para generar PDFs.');
    }
}
