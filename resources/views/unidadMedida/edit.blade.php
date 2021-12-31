@extends('adminlte::page')

@section('title', 'EDITAR UNIDAD DE MEDIDA')

@section('content_header')
    <h1>Editar Unidad de Medida</h1>
@stop

@section('content')
<form action="{{route('unidadMedida.update',compact('unidadMedida'))}}" method="POST">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name = "nombre" placeholder="nombre de unidad de medida" required value="{{$unidadMedida->nombre}}">
    </div>
    <div class="form-group">
        <label for="abreviacion">Abreviacion </label>
        <input type="text" class="form-control" id="abreviacion" name = "abreviacion" placeholder="abreviacion" required value="{{$unidadMedida->abreviacion}}">
    </div>
    @csrf
    @method('put')
      <a href="{{route('unidadMedida.index')}}" class="btn btn-danger mb-4" >Cancelar</a>
      <button class="btn btn-primary mb-4" type="submit" >Guardar</button>
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
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop