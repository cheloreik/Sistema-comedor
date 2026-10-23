@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold">Reportes</h1>

        <p class="text-secondary">
            Transforma los datos del comedor en decisiones para tu equipo.
        </p>
    </div>

    <div>

        <button class="btn btn-outline-primary me-2">
            Exportar PDF
        </button>

        <button class="btn btn-primary">
            Exportar Excel
        </button>

    </div>

</div>

<!-- FILTROS -->

<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-3">
                <label class="form-label">Fecha desde</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Fecha hasta</label>
                <input type="date" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">Empleado</label>

                <select class="form-select">
                    <option>Todos los empleados</option>
                </select>
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-primary w-100">
                    Generar Reporte
                </button>
            </div>

        </div>

    </div>

</div>

<!-- INDICADORES -->

<div class="row mb-4">

    <div class="col-md-4">

        <div class="card shadow-sm">
            <div class="card-body">

                <h2 class="text-primary">1.854</h2>

                <small>
                    Reservas en el período
                </small>

            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm">
            <div class="card-body">

                <h2 class="text-primary">1.698</h2>

                <small>
                    Raciones entregadas
                </small>

            </div>
        </div>

    </div>

    <div class="col-md-4">

        <div class="card shadow-sm">
            <div class="card-body">

                <h2 class="text-primary">91.6%</h2>

                <small>
                    Tasa de consumo
                </small>

            </div>
        </div>

    </div>

</div>

<!-- RESUMENES -->

<div class="row mb-4">

    <div class="col-lg-4">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h4>Reporte de consumo diario</h4>

                <h1 class="mt-4">246</h1>

                <p class="text-secondary">
                    raciones entregadas de 284
                </p>

                <div class="progress mb-4">

                    <div class="progress-bar"
                         style="width:86%">
                        86%
                    </div>

                </div>

                <table class="table table-sm">

                    <tr>
                        <td>Empleados</td>
                        <td>196</td>
                    </tr>

                    <tr>
                        <td>Familiares</td>
                        <td>50</td>
                    </tr>

                    <tr>
                        <td>Sin consumo</td>
                        <td>38</td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

    <div class="col-lg-8">

        <div class="card shadow-sm h-100">

            <div class="card-body">

                <h4>Reporte de reservas por fecha</h4>

                <p class="text-secondary">
                    Del 9 al 15 de octubre
                </p>

                <div class="alert alert-light text-center">

                    Gráfico de reservas por día

                    <br>

                    236 | 258 | 242 | 275 | 261 | 298 | 284

                </div>

            </div>

        </div>

    </div>

</div>

<!-- TABLA -->

<div class="card shadow-sm">

    <div class="card-header bg-white">

        <h4>Reporte por empleado</h4>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead>

            <tr>
                <th>Código</th>
                <th>Empleado</th>
                <th>Área</th>
                <th>Reservas</th>
                <th>Consumos</th>
                <th>Familiares</th>
                <th>Tasa Consumo</th>
            </tr>

            </thead>

            <tbody>

            <tr>
                <td>EMP-001</td>
                <td>Carlos Mendoza</td>
                <td>Operaciones</td>
                <td>12</td>
                <td>11</td>
                <td>5</td>
                <td>91.7%</td>
            </tr>

            <tr>
                <td>EMP-002</td>
                <td>Ana García</td>
                <td>Finanzas</td>
                <td>10</td>
                <td>9</td>
                <td>3</td>
                <td>90%</td>
            </tr>

            <tr>
                <td>EMP-003</td>
                <td>Luis Fernández</td>
                <td>Tecnología</td>
                <td>7</td>
                <td>6</td>
                <td>0</td>
                <td>85.7%</td>
            </tr>

            <tr>
                <td>EMP-004</td>
                <td>Patricia Rojas</td>
                <td>Recursos Humanos</td>
                <td>7</td>
                <td>7</td>
                <td>0</td>
                <td>100%</td>
            </tr>

            </tbody>

        </table>

    </div>

</div>

<div class="alert alert-primary mt-4">

    Los reportes permiten analizar reservas, consumo,
    asistencia de familiares y aprovechamiento de cupos.

</div>

@endsection