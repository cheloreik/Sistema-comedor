@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <div>
        <h1>Gestión de Empleados</h1>

        <p class="text-secondary">
            Administra la información y acceso al comedor.
        </p>
    </div>

    <div>
        <button class="btn btn-primary">
            Nuevo Empleado
        </button>
    </div>

</div>

<div class="card">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-5">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Buscar empleado">
            </div>

            <div class="col-md-3">
                <select class="form-select">
                    <option>Todas las áreas</option>
                </select>
            </div>

            <div class="col-md-2">
                <select class="form-select">
                    <option>Todos los estados</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-outline-primary w-100">
                    Filtrar
                </button>
            </div>

        </div>

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Área</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>EMP-001</td>
                    <td>Carlos Mendoza</td>
                    <td>Operaciones</td>
                    <td>Supervisor</td>

                    <td>
                        <span class="badge bg-success">
                            Activo
                        </span>
                    </td>

                    <td>
                        <a href="#">Editar</a> |
                        <a href="#">Detalle</a>
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection