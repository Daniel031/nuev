@extends('adminlte::page')

@section('title', 'UNIDAD DE MEDIDA')

@section('content_header')
    <h1>Unidad de medidas</h1>
@stop

@section('content')
<a href=" {{route('unidadMedida.create')}} " class="btn btn-primary mb-4" >CREAR</a>

<table id="pacientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
    <thead class="bg-dark text-white">
        
       <tr>
        <th scope="col">ID</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">ABREVIACION</th>
          <th scope="col">ACCIONES</th>
       </tr>
    </thead>
    <TBODY>
        @foreach ($unidadMedidas as $unidadMedida)
                <tr>

                <td>{{$unidadMedida->id}}</td>
                <td>{{$unidadMedida->nombre}}</td>
                <td>{{$unidadMedida->abreviacion}}</td>

                <td>
     
         
                    <form action="{{route('unidadMedida.destroy',compact('unidadMedida'))}}" method="POST">
                        <a href="{{route('unidadMedida.edit',compact('unidadMedida'))}}" class="btn btn-primary">Editar</a>                        
                        @csrf  <!--metodo para añadir token a un formulario-->
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop