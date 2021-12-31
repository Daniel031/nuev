@extends('adminlte::page')

@section('title', 'CREAR PACIENTE')

@section('content_header')
    <h1>Crear Tipo Medida</h1>
@stop

@section('content')
    <form action="{{ route('tipoMedida.store') }}" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion </label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" required>
        </div>
        

  <a href="{{route('tipoMedida.index')}}" class="btn btn-danger mb-4" >Cancelar</a>
  <button class="btn btn-primary mb-4" type="submit" >Guardar</button>
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
