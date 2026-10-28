@extends('layouts.app')

@section('content')

<div class="p-2">

    <div>
        <h1 class="text-center">{{ $menu->plato }}</h1>

        <p class="text-center text-secondary">
            {{ date('d-m-Y', strtotime($menu->fecha)) }}
        </p>
    </div>
    <div>
    <a href="{{ route('entregas.index') }}"
        class="btn btn-warning">
        volver
    </a>
</div>

</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-5">
                <input
                    type="text"
                    class="form-control"
                    id="inputBuscar"
                    placeholder="Buscar empleado">
            </div>

        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Cargo / Tipo</th>
                    <th>Estado Actual</th>
                    <th>ACCINÓN / ENTREGA</th>
                </tr>
            </thead>
            <tbody id="tabla">

                @foreach($reservas as $reserva)
                <tr>
                    <td>
                        {{-- Dependiendo de si es User o Familiar, accedemos a sus propiedades --}}
                        @if($reserva->reservable_type == 'App\Models\User')
                            {{ $reserva->reservable->name }} {{ $reserva->reservable->lastname }}
                        @else
                            {{ $reserva->reservable->nombres }} {{ $reserva->reservable->apellidos }}
                        @endif
                    </td>
                    <td>
                        {{ $reserva->reservable_type == 'App\Models\User' ? 'empleado' : 'familiar' }}
                    </td>
                    <td>
                        {{-- Mostramos el estado actual del plato --}}
                        @if($reserva->estado == 'reservado')
                            <span class="badge bg-warning text-dark">Reservado</span>
                        @elseif($reserva->estado == 'entregado')
                            <span class="badge bg-success">Entregado</span>
                        @else
                            <span class="badge bg-secondary">{{ $reserva->estado }}</span>
                        @endif
                    </td>
                    <td>
                        @if($reserva->estado == 'reservado')
                            <form action="{{ route('entregas.update', $reserva->id) }}" method="POST" style="display:inline-block;"
                                onsubmit="return confirm('¿Estás seguro de confirmar la entrega de este plato? Esta acción no se puede deshacer.')">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm" title="Confirmar Entrega">
                                    <i class="fas fa-check-double"></i> Confirmar Entrega
                                </button>
                            </form>
                        @else
                            <span class="text-muted">Sin acciones</span>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>

@endsection