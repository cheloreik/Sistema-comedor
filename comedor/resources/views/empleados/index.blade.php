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
            <a href="{{ route('empleados.create') }}"
                class="btn btn-primary">
                + Nuevo Empleado
            </a>
        


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
                    <th>Empleado</th>
                    <th>Área</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Crédito</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody>

  @foreach($empleados as $empleado)

        <tr>

            <td>{{ $empleado->codigo }}</td>

            <td>
                {{ $empleado->nombres }}
                {{ $empleado->apellidos }}
            </td>

            <td>{{ $empleado->area }}</td>

            <td>{{ $empleado->cargo }}</td>

            <td>{{ $empleado->estado }}</td>


<!--para la edicion de los datos empleados-->            
     <td>
    <a href="{{ route('empleados.edit', $empleado->id) }}"
       class="btn btn-warning btn-sm">
        Editar
    </a>

    <form action="{{ route('empleados.destroy', $empleado->id) }}"
          method="POST"
          style="display:inline-block;">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm"
                onclick="return confirm('¿Desea eliminar este empleado?')">
            Eliminar
        </button>

    </form>
</td>

                <td>
                Bs.
                {{ $empleado->credito_disponible }}
            </td>

        </tr>

        @endforeach

             

            </tbody>

        </table>

    </div>

</div>

@endsection