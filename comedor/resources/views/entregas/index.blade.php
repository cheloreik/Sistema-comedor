@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">
            Entrega de Comidas
        </h1>

        <p class="text-secondary">
            Valida y registra las entregas de alimentos.
        </p>
    </div>

</div>

<div class="card">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-6">

                <label>Código de Reserva</label>

                <input type="text"
                       class="form-control"
                       placeholder="RES-0001">

            </div>

            <div class="col-md-3 d-flex align-items-end">

                <button class="btn btn-primary w-100">
                    Buscar
                </button>

            </div>

        </div>

        <table class="table">

            <thead>
                <tr>
                    <th>Reserva</th>
                    <th>Empleado</th>
                    <th>Beneficiario</th>
                    <th>Menú</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>RES-0284</td>
                    <td>Carlos Mendoza</td>
                    <td>Elena Rojas</td>
                    <td>Pollo al horno</td>

                    <td>
                        <span class="badge bg-warning">
                            Pendiente
                        </span>
                    </td>

                    <td>
                        <button class="btn btn-success">
                            Entregar
                        </button>
                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection
