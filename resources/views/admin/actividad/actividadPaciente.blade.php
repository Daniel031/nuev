@extends('adminlte::page')

@section('title', 'Actividad Paciente')

@section('content_header')
    <h1>PACIENTE ACTIVIDADES</h1>
@stop

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="form-group">
                    <h3 class="text-bold">Paciente: </h3>
                </div>
                <div class="form-group">
                    <h3 class="px-2"> {{ $paciente->persona->nombres }} {{ $paciente->persona->apellidos }}</h3>
                </div>
            </div>

            <a href="{{route('paciente.actividadCreate',compact('paciente'))}}" class="btn btn-primary">Actividad Paciente</a>
        </div>
        <div class="card-body">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Fecha Registrada</th>
                        <th>Estado</th>
                        <th>Veces a la semana</th>
                        <th>Gasto Energético diario</th>
                        <th>Gasto Energético total</th>
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

                            <td>{{$control->cantidadSemanal}}</td>
                            <td>{{$control->gastoActividad}}</td>
                            <td>{{$control->gastoActividad*$control->cantidadSemanal}}</td>
                            <td>
                                <a href="" class="btn btn-primary"><i class="fas fa-eye fa-2x px-2"></i></a>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
