@extends('layouts.app')

@section('content')

<h2>Nuevo Familiar</h2>

<form action="{{ route('familiares.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label>Empleado</label>

        <select name="empleado_id"
                class="form-select">

            @foreach($empleados as $empleado)

                <option value="{{ $empleado->id }}">
                    {{ $empleado->codigo }}
                    -
                    {{ $empleado->nombres }}
                    {{ $empleado->apellidos }}
                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">
        <label>Nombres</label>
        <input type="text"
               name="nombres"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Apellidos</label>
        <input type="text"
               name="apellidos"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>CI</label>
        <input type="text"
               name="ci"
               class="form-control">
    </div>

    <div class="mb-3">

        <label>Parentesco</label>

        <select name="parentesco"
                class="form-select">

            <option>Esposo(a)</option>
            <option>Hijo(a)</option>
            <option>Padre</option>
            <option>Madre</option>
            <option>Hermano(a)</option>

        </select>

    </div>

    <div class="mb-3">
        <label>Fecha de Nacimiento</label>
        <input type="date"
               name="fecha_nacimiento"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text"
               name="telefono"
               class="form-control">
    </div>

    <button class="btn btn-success">
        Guardar Familiar
    </button>

</form>

@endsection