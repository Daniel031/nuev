@extends('adminlte::page')

@section('title', 'TRATAMIENTO')

@section('content_header')
    <h1>Tratamientos del paciente {{ $persona->nombres }} {{ $persona->apellidos }}</h1>
@stop

@section('content')
    <a href=" {{ route('tratamientos.create') }} " class="btn btn-primary mb-4">CREAR</a>

    <table id="pacientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
        <thead class="bg-dark text-white">
            <tr>
                <th scope="col">OBJETIVO</th>
                <th scope="col">INICIO</th>
                <th scope="col">FIN</th>
                <th scope="col">COSTO</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCIONES</th>

            </tr>
        </thead>
        <TBODY>
            @foreach ($tratamientos as $tratamiento)
                <tr>
                    <td>{{ $tratamiento->objetivo }}</td>
                    <td>{{ $tratamiento->fechaInicio }}</td>
                    <td>{{ $tratamiento->fechaFin }}</td>
                    <td>{{ $tratamiento->costo }}</td>
                    <td>
                        @php
                            $aux = ($tratamiento->completo == 0) ? 'en curso' : 'finalizado';
                        @endphp
                        {{ $aux }}
                    </td>
                    <td>
                        <form action="{{ route('tratamientos.destroy', compact('tratamiento')) }}" method="POST">
                            <a href="{{ route('tratamientos.edit', compact('tratamiento')) }}"
                                class="btn btn-primary">Editar</a>
                            @csrf
                            <!--metodo para añadir token a un formulario-->
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>


            @endforeach
        </TBODY>
    </table>
    <a href="{{ route('paciente.show', compact('paciente')) }}" class="btn btn-secondary mb-4">Volver</a>
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
