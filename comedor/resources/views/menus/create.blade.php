@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Nuevo Menú de Almuerzo</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Fecha -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" min="{{ date('Y-m-d') }}" class="form-control @error('fecha') is-invalid @enderror" value="{{ old('fecha', date('Y-m-d')) }}">
                        @error('fecha')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Estado -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Estado</label>
                        <select name="estado" class="form-select @error('estado') is-invalid @enderror">
                            <option value="Borrador" {{ old('estado') == 'Borrador' ? 'selected' : '' }}>Borrador</option>
                            <option value="Publicado" {{ old('estado') == 'Publicado' ? 'selected' : '' }}>Publicado</option>
                        </select>
                        @error('estado')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Plato -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Plato Principal</label>
                        <input type="text" name="plato" class="form-control @error('plato') is-invalid @enderror" value="{{ old('plato') }}" placeholder="Ej. Seco de Pollo">
                        @error('plato')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Descripción -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="2">{{ old('descripcion') }}</textarea>
                        @error('descripcion')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Adicional -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Adicional (Sopa, Sábana, Postre, etc.)</label>
                        <textarea name="adicional" class="form-control @error('adicional') is-invalid @enderror" rows="2">{{ old('adicional') }}</textarea>
                        @error('adicional')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Foto (Opcional) -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Foto del Menú (Opcional)</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Guardar Menú</button>
                    <a href="{{ route('menus.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
