@extends('adminlte::page')

@section('title', 'EDITAR ADMINISTRADOR')

@section('content_header')
    <h1>Editar Administrador</h1>
@stop

@section('content')
<form action="{{route('administradors.update',compact('administrador'))}}" method="POST">
<div class="form-group">
    <label for="ci">Ci</label>
    <input type="text" class="form-control" id="ci" name = "ci" placeholder="carnet de identidad" required value="{{$personas->where('id',$administrador->id)->first()->ci}}">
</div>
<div class="form-group">
    <label for="nombres">Nombres </label>
    <input type="text" class="form-control" id="nombres" name = "nombres" placeholder="nombres" required value="{{$personas->where('id',$administrador->id)->first()->nombres}}">
</div>
<div class="form-group">
    <label for="apellidos">Apellidos </label>
    <input type="text" class="form-control" id="apellidos" name = "apellidos" placeholder="apellidos" required value="{{$personas->where('id',$administrador->id)->first()->apellidos}}">
</div>
<div class="form-group">
    <label for="fechaNacimiento">Fecha de nacimiento </label>
    <input type="date"  class="form-control" id="fechaNacimiento" name = "fechaNacimiento" placeholder="Fecha de Nacimiento" required value="{{$personas->where('id',$administrador->id)->first()->fechaNacimiento}}">
</div>
<div class="form-group">
    <label for="sexo">Sexo</label>
    <select class="form-control" id="sexo" name = "sexo">
        @switch($personas->where('id',$administrador->id)->first()->sexo )
            @case("F")
            <option value="M">Masculino</option>
            <option selected value="F">Femenino</option>
            <option value="O">Otros</option>
                @break
            @case("M")
            <option selected value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option value="O">Otros</option>
                @break
            @case("O")
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option selected value="O">Otros</option>
                @break
            @default

        @endswitch

    </select>
</div>
<div class="form-group">
    <label for="celular">Celular </label>
    <input type="number"  class="form-control" id="celular" name = "celular" placeholder="Numero de celular" required value="{{$personas->where('id',$administrador->id)->first()->celular}}">
</div>

  
  <a href="{{route('administradors.index')}}" class="btn btn-danger mb-4" >Cancelar</a>
  <button class="btn btn-primary mb-4" type="submit" >Guardar</button>
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
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop