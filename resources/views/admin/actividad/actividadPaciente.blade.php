@extends('adminlte::page')

@section('title', 'Actividad Paciente')

@section('content_header')
    <h1>PACIENTE ACTIVIDADES</h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row g-3">
                <div class="col-1">
                    <label class="text-bold">Paciente: </label>
                </div>
                <div class="col-4">
                    <p> {{ $paciente->persona->nombres }}
                        {{ $paciente->persona->apellidos }}</p>
                </div>
                <div class="col-auto">
                    <label class="text-bold">Peso: </label>
                </div>
                <div class="col-auto">
                    <p>{{ $historialC->peso }} kg</p>
                </div>
            </div>
                .
            <a href="{{ route('paciente.actividadCreate', compact('paciente')) }}" class="btn btn-primary">Actividad
                Paciente</a>
            <a href="" id="btnAgua" name="btnAgua" class="btn btn-warning">Recomendar Agua</a>

                <input id="agua" name="agua" disabled type="number" value="" class="text-bold"
                    style="color: #606061;width: 60px">
                <label>litros</label>

        </div>
        <div class="card-body">
            <table table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha Registrada</th>
                        <th>Estado</th>
                        <th>Veces a la semana</th>
                        <th>Gasto Energético diario(kcal)</th>
                        <th>Gasto Energético total veces(kcal)</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($controles as $control)
                        <tr>
                            <td>{{ $control->fecha }}</td>
                            <td>

                                @if ($control->cumplido)
                                    cumplido
                                @else
                                    no cumplido
                                @endif

                            </td>

                            <td>{{ $control->cantidadSemanal }}</td>
                            <td>{{ $control->gastoActividad }}</td>
                            <td>{{ $control->gastoActividad * $control->cantidadSemanal }}</td>
                            <td>
                                <a href="{{route('paciente.actividadShow',compact('paciente','control'))}}" class="btn btn-primary"><i class="fas fa-eye fa-2x px-2"></i></a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    @stop

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script>
            console.log('Hi!');

            $(document).ready(function() {
                $('#example').DataTable({
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por página",

                        "zeroRecords": "Nothing found - sorry",
                        "info": "Mostrar página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado desde _MAX_ registros totales)"
                    }
                });
            });
            (function load() {
                const btnAgua = document.getElementById('btnAgua');
                btnAgua.addEventListener("click", (event) => {
                    event.preventDefault();
                    let agua = document.getElementById('agua');

                    agua.value = ("<?php echo $historialC->peso; ?>" * 35 / 1000) * (1 + 0.20);
                })
            })()
        </script>
    @stop
