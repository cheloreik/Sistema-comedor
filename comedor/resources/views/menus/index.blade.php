@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">Gestión de Menús</h1>
        <p class="text-secondary">
            Planifica el servicio diario y publica una propuesta para tu comunidad.
        </p>
    </div>

    <button class="btn btn-primary">
        + Nuevo menú
    </button>

</div>

<div class="row">

    <!-- FORMULARIO -->
    <div class="col-lg-8">

        <div class="card shadow-sm">

            <div class="card-body">

                <h4>Información del menú</h4>

                <div class="row mt-4">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cupo disponible</label>
                        <input type="number" class="form-control">
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Plato principal</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Guarnición</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ensalada</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Bebida</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Postre</label>
                        <input type="text" class="form-control">
                    </div>

                </div>

                <div class="alert alert-primary">
                    Capacidad total: 320 raciones · 284 reservas.
                </div>

                <div class="text-end">

                    <button class="btn btn-outline-primary">
                        Guardar
                    </button>

                    <button class="btn btn-primary">
                        Publicar Menú
                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- VISTA PREVIA -->
    <div class="col-lg-4">

        <div class="card shadow-sm">

            <div class="card-body">

                <h4>Vista previa</h4>

                <img
                    src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=800"
                    class="img-fluid rounded my-3"
                    alt="Menú del día">

                <h3>Pollo al horno</h3>

                <p class="text-secondary">
                    Jueves 15 Oct · 12:00 a 14:30
                </p>

                <ul class="list-group">

                    <li class="list-group-item">
                        Guarnición: Arroz primavera
                    </li>

                    <li class="list-group-item">
                        Ensalada: Ensalada mixta
                    </li>

                    <li class="list-group-item">
                        Bebida: Limonada
                    </li>

                    <li class="list-group-item">
                        Postre: Gelatina de frutas
                    </li>

                </ul>

                <h2 class="text-primary mt-3 text-end">
                    36
                </h2>

                <small>Cupos disponibles</small>

            </div>

        </div>

    </div>

</div>

<!-- PLANIFICACIÓN -->

<div class="card shadow-sm mt-4">

    <div class="card-body">

        <h4>Planificación de la semana</h4>

        <div class="row mt-3">

            <div class="col-md-4">

                <div class="border rounded p-3">
                    <h6>14 OCT · MIÉRCOLES</h6>
                    <strong>Lasaña de verduras</strong>
                </div>

            </div>

            <div class="col-md-4">

                <div class="border rounded p-3 bg-light">
                    <h6>15 OCT · JUEVES</h6>
                    <strong>Pollo al horno</strong>
                </div>

            </div>

  S</h6>
                    <strong>Carne al jugo</strong>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection