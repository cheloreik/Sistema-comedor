@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">Gestión de Menús</h1>
        <p class="text-secondary">
            Planifica el servicio diario y publica una propuesta para tu comunidad.
        </p>
    </div>

    <a href="{{ route('menus.create') }}" class="btn btn-primary">
        + agregar menú
    </a>

    
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">

    <div class="card">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-5">
                <input
                    type="text"
                    class="form-control"
                    id="inputBuscar"
                    placeholder="Buscar menu">
            </div>

        </div>

        <table class="table table-hover" >

            <thead>

                <tr>
                    <th>Fecha</th>
                    <th>Imagen</th>
                    <th>Plato</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody id="tabla">

  @foreach($menus as $menu)

        <tr>

            <td>{{ date('d-m-Y', strtotime($menu->fecha)) }}</td>
            <td>
                @if($menu->foto)
                    <img src="{{ asset('storage/' . $menu->foto) }}" 
                        alt="Foto del plato" 
                        width="50" 
                        height="50" 
                        class="img-thumbnail" 
                        style="object-fit: cover;">
                @else
                    <span class="text-muted small">Sin foto</span>
                @endif
            </td>
            <td>{{ $menu->plato }}</td>
            <td>
                {!! nl2br(e($menu->descripcion)) !!}
            </td>
            <td>
                <span class="badge bg-{{ $menu->estado=='Publicado' ? 'success text-white' : 'warning text-dark' }}">
                    {{ $menu->estado }}
                </span>
            </td>
          
            <td>
                <a href="{{ route('menus.edit', $menu->id) }}"
                class="btn btn-light text-primary btn-sm" title="editar">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <form action="{{ route('menus.destroy', $menu->id) }}"
                    method="POST"
                    style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm" title="eliminar"
                            onclick="return confirm('¿Desea eliminar este menu?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                </form>
            </td>


        </tr>

        @endforeach

             

            </tbody>

        </table>

    </div>

</div>



@endsection