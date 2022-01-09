@extends('adminlte::page')

@section('title', 'PACIENTE')

@section('content_header')
    <h1>Plan Alimentacion</h1>

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
<a href=" {{ route('paciente.tratamiento.planAlimentacion.create',compact('paciente','tratamiento')) }} " class="btn btn-primary mb-4">CREAR</a>

<br>
<table id="pacientes" class="table table-striped table-bordered shadow-lg mt-3" style="width:100%">
<thead class="bg-dark text-white">

   <tr>
    <th scope="col">ID</th>
      <th scope="col">FECHA DE INICIO</th>
      <th scope="col">FECHA FINAL</th>
      <th scope="col">ACTIVO</th>
      <th scope="col">ACCIONES</th>

   </tr>
</thead>
<TBODY>
    @foreach ($planAlimentacions as $plan)
            <tr>

            <td>{{$plan->id}}</td>
            <td>{{$plan->fechaInicio}}</td>
            <td>{{$plan->fechaFin}}</td>
            <td>{{$plan->activo}}</td>

            <td>


                <form action="" method="POST">
                    <a href="" class="btn btn-primary">Ver</a>

                    @csrf  <!--metodo para añadir token a un formulario-->
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Editar</button>
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
