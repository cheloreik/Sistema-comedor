@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">Gestión de Usuarios</h1>
        <p class="text-secondary">
            Controla los permisos y la seguridad de acceso al sistema.
        </p>
    </div>

    <button class="btn btn-primary">
        + Crear Usuario
    </button>

</div>

<!-- FILTROS -->

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <label class="form-label">Buscar usuario</label>
                <input type="text"
                       class="form-control"
                       placeholder="Usuario o nombre completo">
            </div>

            <div class="col-md-3">
                <label class="form-label">Rol</label>

                <select class="form-select">
                    <option>Todos los roles</option>
                    <option>Administrador</option>
                    <option>Responsable de comedor</option>
                    <option>Operador</option>
                    <option>Empleado</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Estado</label>

                <select class="form-select">
                    <option>Todos los estados</option>
                    <option>Activo</option>
                    <option>Bloqueado</option>
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-outline-primary w-100">
                    Filtrar
                </button>
            </div>

        </div>

    </div>

</div>

<div class="row">

    <!-- TABLA -->

    <div class="col-lg-8">

        <div class="card shadow-sm">

            <div class="card-header bg-white">
                <h4>Usuarios del sistema</h4>
            </div>

            <div class="card-body p-0">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        <td>maria.lopez</td>
                        <td>María López</td>
                        <td>Administrador RRHH</td>

                        <td>
                            <span class="badge bg-success">
                                Activo
                            </span>
                        </td>

                        <td>Tu cuenta</td>
                    </tr>

                    <tr>
                        <td>ana.garcia</td>
                        <td>Ana García</td>
                        <td>Operador</td>

                        <td>
                            <span class="badge bg-success">
                                Activo
                            </span>
                        </td>

                        <td>
                            <a href="#">Gestionar</a>
                        </td>
                    </tr>

                    <tr>
                        <td>pedro.suarez</td>
                        <td>Pedro Suárez</td>
                        <td>Responsable de comedor</td>

                        <td>
                            <span class="badge bg-success">
                                Activo
                            </span>
                        </td>

                        <td>
                            <a href="#">Gestionar</a>
                        </td>
                    </tr>

                    <tr>
                        <td>diego.vargas</td>
                        <td>Diego Vargas</td>
                        <td>Empleado</td>

                        <td>
                            <span class="badge bg-danger">
                                Bloqueado
                            </span>
                        </td>

                        <td>
                            <a href="#">Gestionar</a>
                        </td>
                    </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- PANEL DERECHO -->

    <div class="col-lg-4">

        <div class="card shadow-sm mb-3">

            <div class="card-body">

                <h4>Acciones de Usuario</h4>

                <p class="text-secondary">
                    ana.garcia
                </p>

                <span class="badge bg-success mb-3">
                    Activo
                </span>

                <div class="d-grid gap-2">

                    <button class="btn btn-outline-primary">
                        Editar
                    </button>

                    <button class="btn btn-outline-secondary">
                        Restablecer/button>

                    <button class="btn btn-outline-danger">
                        Bloquear Usuario
                    </button>

                </div>

            </div>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <h4>Usuario Bloqueado</h4>

                <p class="text-secondary">
                    diego.vargas
                </p>

                <span class="badge bg-danger mb-3">
                    Bloqueado
                </span>

                <p>
                    Su acceso al sistema está suspendido.
                </p>

                <button class="btn btn-success">
                    Activar Usuario
                </button>

            </div>

        </div>

    </div>

</div>

<div class="alert alert-primary mt-4">

    Las acciones disponibles dependen del estado del usuario.
    No puedes bloquear tu propia cuenta de administración.

</div>

@endsection