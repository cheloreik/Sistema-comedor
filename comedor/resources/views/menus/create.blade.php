@extends('layouts.app')

@section('content')

<h2>Crear Menú</h2>

<form action="{{ route('menus.store') }}"
      method="POST">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-3">
            <label>Fecha</label>
            <input type="date"
                   name="fecha"
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Cupo disponible</label>
            <input type="number"
                   name="cupo_disponible"
                   class="form-control">
        </div>

        <div class="col-12 mb-3">
            <label>Plato Principal</label>
            <input type="text"
                   name="plato_principal"
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Guarnición</label>
            <input type="text"
                   name="guarnicion"
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Ensalada</label>
            <input type="text"
                   name="ensalada"
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Bebida</label>
            <input type="text"
                   name="bebida"
                   class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Postre</label>
            <input type="text"
                   name="postre"
                   class="form-control">
        </div>

    </div>

    <button class="btn btn-success">
        Guardar Menú
    </button>

</form>

@endsection