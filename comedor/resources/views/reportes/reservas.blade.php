@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Reporte de Reservas y Platos Consumidos</h6>
            
            <!-- Contenedor de Botones de Exportación (Oculto por defecto) -->
            <div id="contenedorExportar" style="display: none;">
                <a href="#" id="btnExcel" class="btn btn-success btn-sm me-2">
                    <i class="fas fa-file-excel"></i> Exportar Excel
                </a>
                <a href="#" id="btnPdf" class="btn btn-danger btn-sm">
                    <i class="fas fa-file-pdf"></i> Exportar PDF
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Formulario de Filtros -->
            <form id="formFiltroReporte" class="row mb-4">
                <div class="form-group col-12 col-sm-6 col-md-4">
                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required value="{{ date('Y-m-01') }}">
                </div>
                <div class="form-group col-12 col-sm-6 col-md-4">
                    <label for="fecha_fin">Fecha Fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required value="{{ date('Y-m-d') }}">
                </div>
                <div class="form-group col-12 col-sm-6 col-md-4">
                    <label for="empleado_id">Empleado / Familiar:</label>
                    <select id="empleado_id" name="empleado_id" class="form-control">
                        <option value="">-- Todos --</option>
                        @foreach($empleados as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->name }} {{ $emp->lastname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-sm-6 col-md-4">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" class="form-control">
                        <option value="">-- Todos los estados --</option>
                        <option value="reservado">Reservado</option>
                        <option value="entregado">Entregado</option>
                        <option value="cancelado">Cancelado</option>
                        <option value="no entregado">No Entregado</option>
                        <option value="eliminado">Eliminado</option>
                    </select>
                </div>
                <div class="form-group col-md-12 text-right mt-3">
                    <button type="submit" class="btn btn-primary px-4">Generar Reporte</button>
                </div>
            </form>

            <!-- Tabla de Resultados -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="tablaReporte" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Plato</th>
                            <th>Beneficiario</th>
                            <th>Parentesco</th>
                            <th>Estado</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpoTabla">
                        <tr>
                            <td colspan="7" class="text-center text-muted">Seleccione los filtros y presione Generar Reporte.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#btnPdf').off('click').on('click', function(e) {
    e.preventDefault();
    window.print(); // Abre el diálogo de impresión donde seleccionas "Guardar como PDF"
});
    $('#formFiltroReporte').on('submit', function(e) {
        e.preventDefault();

        let fechaInicio = $('#fecha_inicio').val();
        let fechaFin = $('#fecha_fin').val();
        let empleadoId = $('#empleado_id').val();
        let estado = $('#estado').val();

        let formData = {
            fecha_inicio: fechaInicio,
            fecha_fin: fechaFin,
            empleado_id: empleadoId,
            estado: estado,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            url: "{{ route('reportes.reservas.filtrar') }}",
            type: "POST",
            data: formData,
            beforeSend: function() {
                $('#cuerpoTabla').html('<tr><td colspan="7" class="text-center">Cargando datos...</td></tr>');
                $('#contenedorExportar').hide(); // Ocultar botones mientras carga
            },
            success: function(response) {
                let filas = '';
                if(response.length === 0) {
                    filas = '<tr><td colspan="7" class="text-center text-danger">No se encontraron registros con estos filtros.</td></tr>';
                    $('#contenedorExportar').hide(); // Ocultar si no hay datos
                } else {
                    // Actualizar dinámicamente los enlaces de exportación con los parámetros actuales
                    let queryString = `?fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}&empleado_id=${empleadoId}&estado=${estado}`;
                    $('#btnExcel').attr('href', "{{ route('reportes.reservas.excel') }}" + queryString);
                    //$('#btnPdf').attr('href', "{{ route('reportes.reservas.pdf') }}" + queryString);
                    
                    $('#contenedorExportar').show(); // Mostrar botones si hay datos

                    $.each(response, function(index, item) {
                        let badgeClass = 'text-bg-secondary';
                        if(item.estado === 'entregado') badgeClass = 'text-bg-success';
                        else if(item.estado === 'reservado') badgeClass = 'text-bg-primary';
                        else if(item.estado === 'cancelado' || item.estado === 'eliminado') badgeClass = 'text-bg-danger';
                        else if(item.estado === 'no entregado') badgeClass = 'text-bg-warning';
                        
                        filas += `<tr>
                            <td>${item.id}</td>
                            <td>${item.fecha}</td>
                            <td>${item.plato}</td>
                            <td>${item.beneficiario}</td>
                            <td>${item.parentesco}</td>
                            <td><span class="badge ${badgeClass}">${item.estado}</span></td>
                            <td><strong>${item.cantidad}</strong></td>
                        </tr>`;
                    });
                }
                $('#cuerpoTabla').html(filas);
            },
            error: function() {
                alert('Ocurrió un error al generar el reporte.');
                $('#cuerpoTabla').html('<tr><td colspan="7" class="text-center text-danger">Error al cargar.</td></tr>');
                $('#contenedorExportar').hide();
            }
        });
    });
});
</script>

@endsection