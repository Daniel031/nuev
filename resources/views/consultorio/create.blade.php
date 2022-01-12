@extends('adminlte::page')

@section('title', 'CREAR CONSULTORIO')

@section('content_header')
    <h1>Crear Consulta</h1>
@stop

@section('content')
    <form action="{{ route('consultorio.store') }}" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                placeholder="Nombre" required>
        </div>
        <div class="form-group">
            <label for="horaAtencion">Hora de atencion</label>
            <input type="text" class="form-control" id="horaAtencion" name="horaAtencion"
                placeholder="Hora de atencion" required>
        </div>
        <div class="form-group">
            <label for="nombre">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion"
                placeholder="direccion" required>
        </div>

        <a href="{{ route('consultorio.index') }}" class="btn btn-danger mb-4">Cancelar</a>
        <button class="btn btn-primary mb-4" type="submit">Guardar</button>
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
