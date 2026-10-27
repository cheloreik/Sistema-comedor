@extends('layouts.app')

@section('content')

<h2>Mis Reservas</h2>

<div class="card">

    <div class="card-body">

        <h4>Menú Disponible</h4>

        <p>
            Pollo al horno con arroz primavera
        </p>

            <class="btn btn-success">

            Reservar Comida

        </a>

    </div>


    <div class="card">

    <div class="card-body">

        <h4>¿Quién recibirá la comida?</h4>

        <hr>

        <!-- TITULAR -->

        <div class="form-check mb-2">

            <input
                class="form-check-input"
                type="radio"
                name="beneficiario"
                value="titular"
                checked>

            <label class="form-check-label">

                {{ $empleado->nombres }}
                {{ $empleado->apellidos }}

                (Titular)

            </label>

        </div>

        <!-- FAMILIARES -->

        @foreach($familiares as $familiar)

        <div class="form-check mb-2">

            <input
                class="form-check-input"
                type="radio"
                name="beneficiario"
                value="{{ $familiar->id }}">

            <label class="form-check-label">

                {{ $familiar->nombres }}
                {{ $familiar->apellidos }}

                ({{ $familiar->parentesco }})

            </label>

        </div>

        @endforeach

    </div>

</div>




</div>

@endsection