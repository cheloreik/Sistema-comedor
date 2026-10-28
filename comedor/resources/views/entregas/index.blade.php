@php
use Carbon\Carbon;
@endphp
@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">Gestión de entrega</h1>
        <p class="text-secondary">
            Consulta y organiza las solicitudes de alimentación de cada jornada.
        </p>
    </div>

    <span class="badge bg-primary p-2">
        Servicio de almuerzo
    </span>

</div>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            @foreach($menus as $menu)
            <div class="col">
                <div class="card food-card h-100 shadow-sm">
                    <div class="food-img-wrapper">
                        @if($menu->foto)
                            <img src="{{ asset('storage/' . $menu->foto) }}" alt="foto">
                        @else
                            <span class="text-muted small">Sin foto</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div>
                            <span class="text-muted small"><i class="bi bi-clock"></i> {{ Carbon::parse($menu->fecha)->isoFormat('dddd, D [de] MMMM') }}</span>
                        </div>
                        <h5 class="card-title fw-bold text-dark">{{ $menu->plato }}</h5>
                        <div class="card-text text-muted small pb-2">{!! nl2br(e($menu->descripcion)) !!}</div>
                        <div class="mt-auto">
                            <a href="{{ route('entregas.lista',$menu->id) }}" class="btn btn-outline-primary w-100 rounded-pill fw-semibold">
                                <i class="bi bi-cart-plus"></i> Reservar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
</div>




@endsection