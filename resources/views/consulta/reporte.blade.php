@extends('adminlte::page')

@section('title', 'CONSULTA')

@section('content_header')
    <h1>Reporte Consulta</h1>
@stop

@section('content')
    <form action="/consulta/generar" method="POST" target="_blank">

        <div class="form-group">
            <label for="paciente_id">Paciente</label>
            <select class="form-control" id="paciente_id" name="paciente_id">
                <option value="">
                    Ninguno
                </option>
                @foreach ($pacientes as $paciente)
                    <option value={{ $paciente->id }}>
                        {{ $paciente->nombres.' '.$paciente->apellidos }}
                    </option>
                @endforeach

            </select>
        </div>  
        
        <div class="form-group">
            <label for="consultorio_id">Consultorio</label>
            <select class="form-control" id="consultorio_id" name="consultorio_id">
                <option value="">
                    Ninguno
                </option>
                @foreach ($consultorios as $consultorio)
                    <option value={{ $consultorio->id }}>
                        {{ $consultorio->nombre }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="fechaHora_inicio">Fecha y hora Inicio</label>
            <input type="datetime-local" class="form-control" id="fechaHora_inicio" name="fechaHora_inicio" placeholder="fecha y hora de consulta">
        </div>

        <div class="form-group">
            <label for="fechaHora_final">Fecha y hora Final</label>
            <input type="datetime-local" class="form-control" id="fechaHora_final" name="fechaHora_final" placeholder="fecha y hora de consulta">
        </div>

        <div class="form-group">
            <label for="tiempoDeConsultaInicio">Tiempo de Consulta Inicio </label>
            <input type="time" class="form-control" id="tiempoDeConsultaInicio" name="tiempoDeConsultaInicio" placeholder="tiempo de consulta">
        </div>

        <div class="form-group">
            <label for="tiempoDeConsultaFinal">Tiempo de Consulta Final </label>
            <input type="time" class="form-control" id="tiempoDeConsultaFinal" name="tiempoDeConsultaFinal" placeholder="tiempo de consulta">
        </div>

        <div class="form-group">
            <label for="import_option">Importar</label>
            <select class="form-control" id="import_option" name="import_option">
                <option value="PDF">
                    PDF
                </option>
                <option value="EXCEL">
                    EXCEL
                </option>
            </select>
        </div>  

        <a href="{{ route('consulta.index') }}" class="btn btn-danger mb-4">Cancelar</a>
        <button class="btn btn-primary mb-4" type="submit">Generar</button>
        @csrf
        @method('post')
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productosPlatos').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
@stop
