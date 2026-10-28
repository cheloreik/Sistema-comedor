@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Familiar</h2>

    <form action="{{ route('familiares.update', $familiar->id) }}" method="POST">
         @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="empleado_id" class="form-label">Empleado Titular:</label>
            <select name="empleado_id" id="empleado_id" class="form-control @error('empleado_id') is-invalid @enderror" required>
                <option value="">-- Seleccione un empleado --</option>
                @foreach($empleados as $emp)
                    <option value="{{ $emp->id }}" {{ old('empleado_id',$emp->id)== $familiar->empleado_id ? "selected" : ""  }}>{{ $emp->name }} {{ $emp->lastname }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres', $familiar->nombres) }}" required>
                @error('nombres')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos', $familiar->apellidos) }}" required>
                @error('apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="ci" class="form-label">CI:</label>
                <input type="text" name="ci" class="form-control @error('ci') is-invalid @enderror" value="{{ old('ci', $familiar->ci) }}" required>
                @error('ci')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="parentesco" class="form-label">Parentesco:</label>
                <input type="text" name="parentesco" class="form-control @error('parentesco') is-invalid @enderror" placeholder="Ej: Cónyuge, Hijo/a" value="{{ old('parentesco', $familiar->parentesco) }}" required>
                @error('parentesco')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror" value="{{ old('fecha_nacimiento', $familiar->fecha_nacimiento) }}" required>
                @error('fecha_nacimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $familiar->telefono) }}">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <select name="estado" class="form-select @error('estado') is-invalid @enderror" required>
                    <option value="activo" {{ $familiar->estado=="activo" ? "selected" : ""  }} >Activo</option>
                    <option value="inactivo" {{ $familiar->estado=="inactivo" ? "selected" : ""  }} >Inactivo</option>
                </select>
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar Familiar</button>
        <a href="{{ route('familiares.index') }}" class="btn btn-light">Cancelar</a>
    </form>
</div>
@endsection