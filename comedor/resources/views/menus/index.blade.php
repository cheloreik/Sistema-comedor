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
        {{ route('menus.create') }}
    </button>

    
</div>

<div class="row">

    <!-- FORMULARIO -->
    <table class="table">

    <thead>
        <tr>
            <th>Fecha</th>
            <th>Plato Principal</th>
            <th>Cupos</th>
            <th>Estado</th>
        </tr>
    </thead>

    <tbody>

    @foreach($menus as $menu)

        <tr>

            <td>{{ $menu->fecha }}</td>

            <td>{{ $menu->plato_principal }}</td>

            <td>{{ $menu->cupo_disponible }}</td>

            <td>{{ $menu->estado }}</td>

        </tr>

    @endforeach

    </tbody>

</table>





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