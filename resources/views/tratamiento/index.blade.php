@extends('adminlte::page')

@section('title', 'TRATAMIENTO')

@section('content_header')
    <h1>Tratamientos</h1>
@stop

@section('content')

<label for="ci">Paciente ID: {{$paciente->id}}
<br>            Nombre : {{$persona->where('id',$paciente->id)->first()->nombres}} {{$persona->where('id',$paciente->id)->first()->apellidos}}
<br>            Celular: {{$persona->where('id',$paciente->id)->first()->celular}} 
<br>




</label>
<br>
<br>

    <a href=" {{ route('paciente.tratamiento.create',compact('paciente')) }} " class="btn btn-primary mb-4">CREAR</a>
    <a href=" {{ route('paciente.show',compact('paciente')) }} " class="btn btn-success mb-4">VOLVER A PACIENTE</a>

    <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead class="bg-dark text-white">

            <tr>
                <th scope="col">ID</th>
                <th scope="col">OBJETIVO</th>
                <th scope="col">FECHA INICIO</th>
                <th scope="col">FECHA FIN</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCIONES</th>

            </tr>
        </thead>
        <TBODY>
            @foreach ($tratamientos as $tratamiento)
                <tr>
                    <td>{{ $tratamiento->id }}</td>

                    <td>{{ $tratamiento->objetivo }}</td>
                    <td>{{ $tratamiento->fechaInicio }}</td>
                    <td>{{ $tratamiento->fechaFin }}</td>
                    <td>@php
                        $aux = $tratamiento->activo == 0 ? 'Inactivo' : 'Activo';
                    @endphp
                        {{ $aux }}</td>

                    <td>
                        <form action="{{ route('paciente.tratamiento.destroy', compact('paciente','tratamiento')) }}" method="POST">
                            <a href="" style="color:gray" class="btn btn-primary" ><i class="fas fa-eye fa-2x px-2"></i></a>{{-- Planes del tratamiento --}}
                            <a href="{{ route('paciente.tratamiento.edit', compact('paciente','tratamiento')) }}" style="color:blue" class="btn btn-primary"><i class="
                                   fas fa-edit fa-2x px-2"></i></a>

                            @csrf
                            <!--metodo para añadir token a un formulario-->
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button>

                            <a href="{{route('paciente.tratamiento.planAlimentacion.index',compact('paciente','tratamiento'))}}" style="color:white" class="btn btn-secondary" >VER PLANES</a>
                        </form>
                    </td>
                </tr>


            @endforeach
        </TBODY>
    </table>
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
