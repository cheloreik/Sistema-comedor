@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <div>
        <h1>Gestión de Familiares</h1>

        <p class="text-secondary">
            Administra la información y acceso al comedor.
        </p>
    </div>

    <div>
        <a href="{{ route('familiares.create') }}" class="btn btn-primary">
           + Nuevo Familiar
        </a>
    </div>

</div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<div class="card">

    <div class="card-body">

        <div class="row mb-4">

            <div class="col-md-5">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Buscar Familiar">
            </div>

        
        </div>

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Empleado Titular</th>
                    <th>Nombres y Apellidos</th>
                    <th>CI</th>
                    <th>Parentesco</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>

            </thead>

            <tbody>
                @foreach($familiares as $fam)
                    <tr>
                        <td>{{ $fam->empleado->name ?? 'Sin asignar' }} {{ $fam->empleado->lastname ?? 'Sin asignar' }}</td>
                        <td>{{ $fam->nombres }} {{ $fam->apellidos }}</td>
                        <td>{{ $fam->ci }}</td>
                        <td>{{ $fam->parentesco }}</td>
                        <td>{{ $fam->telefono }}</td>
                        <td>
                            <span class="badge bg-{{ $fam->estado == 'activo' ? 'success' : 'secondary' }}">
                                {{ ucfirst($fam->estado) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('familiares.edit', $fam->id) }}" class="btn btn-warning btn-sm" title="editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('familiares.destroy', $fam->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar a ese familiar?')" title="eliminar"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        
            </tbody>

        </table>
        {{ $familiares->links() }}
    </div>

</div>

@endsection