@extends('adminlte::page')

@section('title', 'EDITAR PACIENTE')

@section('content_header')
    <h1>Editar Pacientes</h1>
@stop

@section('content')
<form action="{{ route('consultorio.update',compact('consultorio')) }}" method="POST">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
            placeholder="Nombre" required value="{{$consultorio->nombre}}">
    </div>
    <div class="form-group">
        <label for="horaAtencion">Hora de atencion</label>
        <input type="text" class="form-control" id="horaAtencion" name="horaAtencion"
            placeholder="Hora de atencion" required value="{{$consultorio->horaAtencion}}">
    </div>
    <div class="form-group">
        <label for="nombre">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion"
            placeholder="direccion" required value="{{$consultorio->direccion}}">
    </div>

    <a href="{{ route('consultorio.index') }}" class="btn btn-danger mb-4">Cancelar</a>
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
