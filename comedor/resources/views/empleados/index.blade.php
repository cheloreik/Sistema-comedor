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
            <a href="{{ route('empleados.create') }}"
                class="btn btn-primary">
                + Nuevo Empleado
            </a>

    </div>

</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-5">
                <input
                    type="text"
                    class="form-control"
                    id="inputBuscar"
                    placeholder="Buscar empleado">
            </div>

        </div>

        <table class="table table-hover" >

            <thead>

                <tr>
                    <th>Código</th>
                    <th>Empleado</th>
                    <th>Área</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody id="tabla">

  @foreach($empleados as $empleado)

        <tr>

            <td>{{ $empleado->codigo }}</td>

            <td>
                {{ $empleado->name }}
                {{ $empleado->lastname }}
            </td>

            <td>{{ $empleado->area }}</td>

            <td>{{ $empleado->cargo }}</td>

            <td>{{ $empleado->estado }}</td>


<!--para la edicion de los datos empleados-->            
            <td>
                <a href="{{ route('empleados.edit', $empleado->id) }}"
                class="btn btn-light text-primary btn-sm" title="editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <form action="{{ route('empleados.destroy', $empleado->id) }}"
                    method="POST"
                    style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm" title="eliminar"
                            onclick="return confirm('¿Desea eliminar este empleado?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                </form>
            </td>


        </tr>

        @endforeach

             

            </tbody>

        </table>

    </div>

</div>

@endsection