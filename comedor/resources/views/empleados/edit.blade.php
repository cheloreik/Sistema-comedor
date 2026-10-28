@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">

        <div class="card-header">
            <h3>Editar Empleado</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Código -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Código</label>
                        <input type="text"
                               name="codigo"
                               class="form-control @error('codigo') is-invalid @enderror"
                               value="{{ old('codigo', $empleado->codigo) }}">
                        @error('codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nombres -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text"
                               name="nombres"
                               class="form-control @error('nombres') is-invalid @enderror"
                               value="{{ old('nombres', $empleado->name) }}">
                        @error('nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Apellidos -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text"
                               name="apellidos"
                               class="form-control @error('apellidos') is-invalid @enderror"
                               value="{{ old('apellidos', $empleado->lastname) }}">
                        @error('apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- CI -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">CI</label>
                        <input type="text"
                               name="ci"
                               class="form-control @error('ci') is-invalid @enderror"
                               value="{{ old('ci', $empleado->ci) }}">
                        @error('ci')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Correo -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email"
                               name="correo"
                               class="form-control @error('correo') is-invalid @enderror"
                               value="{{ old('correo', $empleado->email) }}">
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Teléfono -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text"
                               name="telefono"
                               class="form-control @error('telefono') is-invalid @enderror"
                               value="{{ old('telefono', $empleado->telefono) }}">
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Área -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Área</label>
                        <select name="area" class="form-select @error('area') is-invalid @enderror">
                            <option value="">Seleccione un área</option>
                            <option value="Tecnología" {{ old('area', $empleado->area) == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                            <option value="Recursos Humanos" {{ old('area', $empleado->area) == 'Recursos Humanos' ? 'selected' : '' }}>Recursos Humanos</option>
                            <option value="Finanzas" {{ old('area', $empleado->area) == 'Finanzas' ? 'selected' : '' }}>Finanzas</option>
                            <option value="Operaciones" {{ old('area', $empleado->area) == 'Operaciones' ? 'selected' : '' }}>Operaciones</option>
                            <option value="Comercial" {{ old('area', $empleado->area) == 'Comercial' ? 'selected' : '' }}>Comercial</option>
                            <option value="Marketing" {{ old('area', $empleado->area) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Administración" {{ old('area', $empleado->area) == 'Administración' ? 'selected' : '' }}>Administración</option>
                            <option value="Comedor" {{ old('area', $empleado->area) == 'Comedor' ? 'selected' : '' }}>Comedor</option>
                            <option value="Seguridad" {{ old('area', $empleado->area) == 'Seguridad' ? 'selected' : '' }}>Seguridad</option>
                        </select>
                        @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Cargo -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Cargo</label>
                        <input type="text"
                               name="cargo"
                               class="form-control @error('cargo') is-invalid @enderror"
                               value="{{ old('cargo', $empleado->cargo) }}">
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Fecha de Ingreso -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Fecha de Ingreso</label>
                        <input type="date"
                               name="fecha_ingreso"
                               class="form-control @error('fecha_ingreso') is-invalid @enderror"
                               value="{{ old('fecha_ingreso', $empleado->fecha_ingreso) }}">
                        @error('fecha_ingreso')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Crédito Disponible -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Crédito Disponible</label>
                        <input type="number"
                               step="0.01"
                               name="credito_disponible"
                               class="form-control @error('credito_disponible') is-invalid @enderror"
                               value="{{ old('credito_disponible', $empleado->credito_disponible) }}">
                        @error('credito_disponible')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Estado -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                            <option value="Activo" {{ $empleado->estado=="activo" ? "selected" : ""  }} {{ old('estado', $empleado->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ $empleado->estado=="inactivo" ? "selected" : ""  }} {{ old('estado', $empleado->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <script></script>
                    </div>

                    <!-- Contraseña (Opcional en edición) -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Nueva Contraseña <small class="text-muted">(Déjalo en blanco si no deseas cambiarla)</small></label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Guardar Cambios
                    </button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection