@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Editar Menú de Almuerzo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', $menu->fecha) }}">
                        @error('fecha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                            <option value="Publicado" {{ old('estado', $menu->estado) == 'Publicado' ? 'selected' : '' }}>Publicado</option>
                            <option value="Borrador" {{ old('estado', $menu->estado) == 'Borrador' ? 'selected' : '' }}>Borrador</option>
                        </select>
                        @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Plato Principal</label>
                        <input type="text" name="plato" class="form-control @error('plato') is-invalid @enderror" value="{{ old('plato', $menu->plato) }}">
                        @error('plato')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="2">{{ old('descripcion', $menu->descripcion) }}</textarea>
                        @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Adicional</label>
                        <textarea name="adicional" class="form-control @error('adicional') is-invalid @enderror" rows="2">{{ old('adicional', $menu->adicional) }}</textarea>
                        @error('adicional')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Foto del Menú</label>
                        @if($menu->foto)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $menu->foto) }}" alt="Foto menú" width="100" class="img-thumbnail">
                            </div>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Actualizar Cambios</button>
                    <a href="{{ route('menus.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection