@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">Gestión de Reservas</h1>
        <p class="text-secondary">
            Consulta y organiza las solicitudes de alimentación de cada jornada.
        </p>
    </div>

    <span class="badge bg-primary p-2">
        Servicio de almuerzo
    </span>

</div>

<!-- FILTROS -->

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">
                <label class="form-label">Fecha</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Empleado</label>
                <select class="form-select">
                    <option>Todos los empleados</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Estado</label>
                <select class="form-select">
                    <option>Todos los estados</option>
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary w-100">
                    Aplicar filtros
                </button>
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button class="btn btn-light">
                    Limpiar
                </button>
            </div>

        </div>

    </div>

</div>

<!-- TARJETAS RESUMEN -->

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small>Reservas vigentes</small>
                <h2 class="text-primary">284</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small>Confirmadas</small>
                <h2>268</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small>Pendientes</small>
                <h2>16</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <small>Canceladas</small>
                <h2>12</h2>
            </div>
        </div>
    </div>

</div>

<!-- TABLA -->

<div class="card shadow-sm">

    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">

            <div>
                <h4>Reservas del día</h4>
                <small class="text-secondary">
                    Jueves, 15 de octubre de 2026
                </small>
            </div>

            <div>
                <strong>36 cupos disponibles de 320</strong>
            </div>

        </div>

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th>Nro Reserva</th>
                    <th>Empleado</th>
                    <th>Beneficiario</th>
                    <th>Menú</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>RES-0284</td>
                    <td>Carlos Mendoza</td>
                    <td>Elena Rojas</td>
                    <td>Pollo al horno</td>
                    <td>15/10/2026</td>
                    <td>
                        <span class="badge bg-success">
                            Confirmada
                        </span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Ver
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>RES-0283</td>
                    <td>Ana García</td>
                    <td>Valentina García</td>
                    <td>Pollo al horno</td>
                    <td>15/10/2026</td>
                    <td>
                        <span class="badge bg-warning text-dark">
                            Pendiente
                        </span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Ver
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>RES-0282</td>
                    <td>Luis Fernández</td>
                    <td>Titular</td>
                    <td>Pollo al horno</td>
                    <td>15/10/2026</td>
                    <td>
                        <span class="badge bg-secondary">
                            Cancelada
                        </span>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            Ver
                        </a>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

<!-- rmanecen en el historial.

</div>

@endsection