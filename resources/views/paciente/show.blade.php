@extends('adminlte::page')

@section('title', 'PACIENTE')

@section('content_header')
    <h1>Paciente</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
@stop

@section('content')
    <div class="row">
        <div class="card col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <p class="title is-3 py-3">DATOS PERSONALES</p>
                </div>
                <div class="col-md-4">
                    <p class="subtitle is-5">Nombre(s):</p>
                </div>
                <div class="col-sm">
                    <p>{{ $paciente->persona->nombres }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="subtitle is-5">Apellido(s):</p>
                </div>
                <div class="col-md-4">
                    <p>{{ $paciente->persona->apellidos }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="subtitle is-5">Fecha de Nacimiento:</p>
                </div>
                <div class="col-md-4">
                    <p>{{ $paciente->persona->fechaNacimiento }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="subtitle is-5">Sexo:</p>
                </div>
                <div class="col-md-4">
                    @if ($paciente->persona->sexo=='M')
                        <p>Masculino</p>
                    @else
                        <p>Femenino</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="subtitle is-5">Celular:</p>
                </div>
                <div class="col-md-4">
                    <p>{{ $paciente->persona->celular }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p class="subtitle is-5">Correo:</p>
                </div>
                <div class="col-md-4">
                    <p>{{ $paciente->persona->correo }}</p>
                </div>
            </div>
            <div class="row" style="height: 56px;">

                <a href="{{ route('paciente.edit', compact('paciente')) }}" class="btn btn-primary col-sm">Editar</a>

            </div>
        </div>

        <div class="card col-sm" style="margin-left:20px;">
            <div class="row">
                <a href="" class="btn btn-info col-sm py-4"><i class="fas fa-print fa-6x"></i>
                    <label for="" class="px-4">Imprimir</label></a>
            </div>
            <div class="row">
                <a href="{{route("paciente.tratamiento.index", compact('paciente'))}}" class="btn btn-secondary col-sm py-4"><i
                        class="fas fa-notes-medical fa-6x"></i><label for="" class="px-4">Tratamiento</label></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-12">
            <div class="row" style="height: 80px">

                <a href="" class="button is-success col-md-4" style="height: 80px">Plan Alimentacion</a>

                <a href="" class="button is-link col-md-4" style="height: 80px">Generar Consulta</a>

                <a href="" class="button is-primary col-md-4" style="height: 80px">Historial Clínico</a>

            </div>
        </div>
    </div>
    <div class="row" style="heig">
        <div class="card col-12">
            <div class="row" style="height: 80px">

                <a href="{{route('paciente.perfil',compact('paciente'))}}" class="button is-warning col-md-4" style="height: 80px">Perfil Usuario</a>

                <a href="" class="button is-danger is-outlined col-md-4" style="height: 80px">Grupo Plan Alimenticio</a>

                <a href="{{route('paciente.actividad',compact('paciente'))}}" class="button is-dark is-outlined col-md-4" style="height: 80px">Actividad</a>

            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
