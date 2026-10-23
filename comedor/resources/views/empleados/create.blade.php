@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-header">
            <h3>Nuevo Empleado</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('empleados.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Código</label>
                        <input type="text"
                               name="codigo"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Nombres</label>
                        <input type="text"
                               name="nombres"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text"
                               name="apellidos"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">CI</label>
                        <input type="text"
                               name="ci"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email"
                               name="correo"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text"
                               name="telefono"
                               class="form-control">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Área</label>

                        <select name="area"
                                class="form-select"
                                required>

                            <option value="">Seleccione un área</option>

                            <option value="Tecnología">Tecnología</option>
                            <option value="Recursos Humanos">Recursos Humanos</option>
                            <option value="Finanzas">Finanzas</option>
                            <option value="Operaciones">Operaciones</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Administración">Administración</option>
                            <option value="Comedor">Comedor</option>
                            <option value="Seguridad">Seguridad</option>

                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Cargo</label>
                        <input type="text"
                               name="cargo"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Fecha de Ingreso</label>
                        <input type="date"
                               name="fecha_ingreso"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Crédito Disponible</label>
                        <input type="number"
                               step="0.01"
                               name="credito_disponible"
                               class="form-control"
                               value="0">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>

                        <select name="estado"
              select">

                            <option value="Activo">
                                Activo
                            </option>

                            <option value="Inactivo">
                                Inactivo
                            </option>

                        </select>
                    </div>

                </div>

                <div class="mt-3">

                    <button type="submit"
                            class="btn btn-success">
                        Guardar Empleado
                    </button>
                            <button type="submit"
                            class="btn btn-success">
                        Cancelar
                    </button>

                     
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection