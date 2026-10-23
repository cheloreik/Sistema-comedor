@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header">
        <h3>Editar Empleado</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('empleados.update', $empleado->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Código</label>
                <input type="text"
                       name="codigo"
                       class="form-control"
                       value="{{ $empleado->codigo }}">
            </div>

            <div class="mb-3">
                <label>Nombres</label>
                <input type="text"
                       name="nombres"
                       class="form-control"
                       value="{{ $empleado->nombres }}">
            </div>

            <div class="mb-3">
                <label>Apellidos</label>
                <input type="text"
                       name="apellidos"
                       class="form-control"
                       value="{{ $empleado->apellidos }}">
            </div>

            <div class="mb-3">
                <label>Área</label>
                <input type="text"
                       name="area"
                       class="form-control"
                       value="{{ $empleado->area }}">
            </div>

            <div class="mb-3">
                <label>Cargo</label>
                <input type="text"
                       name="cargo"
                       class="form-control"
                       value="{{ $empleado->cargo }}">
            </div>

            <button type="submit"
                    class="btn btn-primary">
                Guardar Cambios
            </button>

            <a href="{{ route('empleados.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </form>

    </div>

</div>

@endsection