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
    <a href="{{ route('reservas.index') }}"
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
                    <th>Cargo</th>
                    <th>RESERVA</th>
                </tr>
            </thead>
            <tbody id="tabla">

                <!-- 1. FILA DEL EMPLEADO / USUARIO -->
                <tr>
                    <td>
                        {{ $empleado->name }} {{ $empleado->lastname }}
                    </td>
                    <td>empleado</td>         
                    <td>
                        @php
                            // Verificamos si el empleado tiene reserva para este menú específico
                            $reservaEmpleado = $empleado->reservas()
                                ->where('plato_id', $menu->id) // Usamos el ID del menú actual
                                ->first();
                        @endphp

                        @if($reservaEmpleado && $reservaEmpleado->estado != 'cancelado')
                            <!-- Botón para CANCELAR reserva -->
                            <form action="{{ route('reservas.destroy', $reservaEmpleado->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Cancelar Reserva">
                                    <i class="fas fa-times-circle"></i> Cancelar Plato
                                </button>
                            </form>
                        @else
                            <!-- Botón para AGREGAR reserva (Envía el plato_id usando $menu->id) -->
                            <form action="{{ route('reservas.store') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="reservable_id" value="{{ $empleado->id }}">
                                <input type="hidden" name="reservable_type" value="{{ get_class($empleado) }}">
                                <input type="hidden" name="plato_id" value="{{ $menu->id }}"> <!-- AQUÍ ESTÁ EL ID DEL MENÚ -->
                                <input type="hidden" name="fecha" value="{{ $menu->fecha }}">
                                <button type="submit" class="btn btn-success btn-sm" title="Reservar Plato">
                                    <i class="fas fa-check-circle"></i> Reservar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>

                <!-- 2. BUCLE DE FAMILIARES -->
                @foreach($familiares as $familiar)
                <tr>
                    <td>
                        {{ $familiar->nombres }} {{ $familiar->apellidos }}
                    </td>
                    <td>familiar</td>         
                    <td>
                        @php
                            // Verificamos si el familiar tiene reserva para este menú específico
                            $reservaFamiliar = $familiar->reservas()
                                ->where('plato_id', $menu->id) // Usamos el ID del menú actual
                                ->first();
                        @endphp

                        @if($reservaFamiliar && $reservaFamiliar->estado != 'cancelado')
                            <!-- Botón para CANCELAR reserva -->
                            <form action="{{ route('reservas.destroy', $reservaFamiliar->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Cancelar Reserva">
                                    <i class="fas fa-times-circle"></i> Cancelar Plato
                                </button>
                            </form>
                        @else
                            <!-- Botón para AGREGAR reserva -->
                            <form action="{{ route('reservas.store') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="reservable_id" value="{{ $familiar->id }}">
                                <input type="hidden" name="reservable_type" value="{{ get_class($familiar) }}">
                                <input type="hidden" name="plato_id" value="{{ $menu->id }}"> <!-- AQUÍ ESTÁ EL ID DEL MENÚ -->
                                <input type="hidden" name="fecha" value="{{ $menu->fecha }}">
                                <button type="submit" class="btn btn-success btn-sm" title="Reservar Plato">
                                    <i class="fas fa-check-circle"></i> Reservar
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>

@endsection