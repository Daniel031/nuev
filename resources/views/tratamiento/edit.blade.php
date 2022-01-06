@extends('adminlte::page')

@section('title', 'EDITAR TRATAMIENTO')

@section('content_header')
    <h1>Editar Tratamiento</h1>
@stop

@section('content')
    <form action="{{ route('tratamientos.update', compact('tratamiento')) }}" method="POST">

        <div class="form-group">
            <label for="ci">Objetivo clínico</label>
            <input type="text" class="form-control" id="ci" name="objetivo" placeholder="objetivos esperados" required
                value="{{ $tratamiento->objetivo }}">
        </div>
        <div class="form-group">
            <label for="nombres">Fecha de inicio </label>
            <input type="date" class="form-control" id="nombres" name="fechaInicio" placeholder="" required
                value="{{ $tratamiento->fechaInicio }}">
        </div>
        <div class="form-group">
            <label for="apellidos">Fecha de finalización </label>
            <input type="date" class="form-control" id="apellidos" name="fechaFin" placeholder="" required
                value="{{ $tratamiento->fechaFin }}">
        </div>
        <div class="form-group">
            <label for="apellidos">Costo de tratamiento</label>
            <input type="number" class="form-control" id="apellidos" name="costo" placeholder="0.00 bs" required
                value="{{ $tratamiento->costo }}">
        </div>
        <div class="">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">Paciente</label>
            <select class="form-control" aria-label=".form-select-sm example" name="paciente_id">
                <option value="{{ $tratamiento->paciente_id }}">Mantener Paciente</option>
                @foreach ($personas as $persona)
                    <option value="{{ $persona->id }}"> {{ $persona->nombres }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
            <br>
        </div>
        <div class="">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">Estado</label>
            <select class="form-control" aria-label=".form-select-sm example" name="completo">
                <option value=0 @php
                    $aux = $tratamiento->completo == 0 ? 'selected' : '';
                @endphp {{ $aux }}>en curso</option>
                <option value=1 @php
                    $aux = $tratamiento->completo == 1 ? 'selected' : '';
                @endphp {{ $aux }}>finalizado</option>
            </select>
        </div>
        <br>
        <a href="{{ url()->previous() }}" class="btn btn-danger mb-4">Cancelar</a>
        <button class="btn btn-primary mb-4" type="submit">Guardar</button>
        @csrf
        @method('put')
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
