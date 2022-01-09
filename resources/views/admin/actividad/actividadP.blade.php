@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1>PACIENTE ACTIVIDADES</h1>
@stop

@section('content')

    <strong class="font-semibold w-full">
        ACTIVIDADES FÍSICAS
    </strong>
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.actividad.create') }}">Nueva Actividad</a>

        <table id="fisica" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">MET</th>
                    <th scope="col">CTTE</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <TBODY>

                @foreach ($fisica as $fis)
                    <tr>

                        @if ($fis->tipo == 'F')
                            <td>{{ $fis->nombre }}</td>
                            <td>{{ $fis->MET }}</td>
                            <td>{{ $fis->ctte }}</td>
                        @endif
                        <td>
                            <!--platos/{plato}/edit-->
                            <!---->
                            <form action="{{route('admin.actividad.destroy',$fis)}}" method="POST">
                                <a href="{{ route('admin.actividad.edit', $fis) }}" class="btn btn-primary">Editar</a>
                                @csrf
                                <!--metodo para añadir token a un formulario-->
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </TBODY>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script>
            console.log('Hi!');
        </script>
    @stop
