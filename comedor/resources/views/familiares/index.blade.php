@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <div>
        <h1>Gestión de Familiares</h1>

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
                    placeholder="Buscar Familiar">
            </div>

            <div class="col-md-3">
                <select class="form-select">
                    <option>Todos Familiares</option>
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
                    <th>Parentesco</th>
                    <th>Empleado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

        <tbody>
    @foreach($familiares as $familiar)
        <tr>
            <td>{{ $familiar->codigo }}</td>

            <td>{{ $familiar->nombre }}</td>

            <td>{{ $familiar->parentesco }}</td>

            <td>
                {{ $familiar->empleado->nombres }}
                {{ $familiar->empleado->apellidos }}
            </td>

            <td>
                <span class="badge bg-success">
                    {{ $familiar->estado }}
                </span>
            </td>

            <td>
                <a href="#">Editar</a> |
                <a href="#">Detalle</a>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>

    </div>

</div>

@endsection