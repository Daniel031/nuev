@extends('adminlte::page')

@section('title', 'PACIENTE')

@section('content_header')
    <h1>COMIDAS</h1>

@stop
@section('content')


<label for="">
    Codigo de tratamiento : {{$tratamiento->id}} <br>
    Fecha de inicio : {{$tratamiento->fechaInicio}} <br>
    Fecha de finalizacion : {{$tratamiento->fechaFin}} <br>
    Costo : {{$tratamiento->costo}} <br>
    Estado : @if ($tratamiento->activo)
        Activo 
    @else
        Inactivo
    @endif
<br>
</label>
<br>
<a href=" {{ route('paciente.tratamiento.planAlimentacion.comida.create',compact('paciente','tratamiento','planAlimentacion')) }} " class="btn btn-primary mb-4">CREAR</a>
<a href=" {{ route('paciente.tratamiento.planAlimentacion.index',compact('paciente','tratamiento')) }} " class="btn btn-secondary mb-4">ATRAS</a>
<a href=" {{ route('paciente.show',compact('paciente')) }} " class="btn btn-success mb-4">VOLVER A PACIENTE</a>
<br>
<table id="pacientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
<thead class="bg-dark text-white">

   <tr>
    <th scope="col">ID</th>
      <th scope="col">NOMBRE DE COMIDA</th>
      <th scope="col">ALIMENTO</th>
      <th scope="col">ACCIONES</th>

   </tr>
</thead>
<TBODY>
    @foreach ($comidas as $comida)
            <tr>

            <td>{{$comida->id}}</td>
            <td>{{$comida->nombre}}</td>
            <td>{{$alimentos->where('id',$comida->alimento_id)->first()->nombre}}</td>


            <td>

                <form action="{{route('paciente.tratamiento.planAlimentacion.comida.destroy',compact('paciente','tratamiento','planAlimentacion','comida'))}}" method="POST">
                    <a href="{{route('paciente.tratamiento.planAlimentacion.comida.edit',compact('paciente','tratamiento','planAlimentacion','comida'))}}" class="btn btn-primary">Editar</a>
                    @method('delete')
                    @csrf  <!--metodo para añadir token a un formulario-->
                    <button type="submit" class="btn btn-secondary">Eliminar</button>
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

@stop
