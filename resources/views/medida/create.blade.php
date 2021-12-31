@extends('adminlte::page')

@section('title', 'CREAR PACIENTE')

@section('content_header')
    <h1>Crear Medida</h1>
@stop

@section('content')
    <form action="{{ route('medida.store') }}" method="POST">
        
        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
        </div>
         <!--*************unidad de medida de la medida**************************-->
         <div class="">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">Unidad de medida</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="u_medida">
                <option selected value="">Selecciona a la unidad de medida</option>
                @foreach ($unidadMedidas as $unidadMedida)
                    {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}
                    <option value="{{ $unidadMedida->id }}">{{ $unidadMedida->nombre }}</option>
                @endforeach
            </select>
        </div> 

        <!--***************************************-->
        <!--*************unidad de medida de la medida**************************-->
        <div class="">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">Tipo de medida</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="tipo_medida_id">
                <option selected value="">Selecciona el tipo de medida</option>
                @foreach ($tipoMedidas as $tipoMedida)
                    {{-- <option value="{{$user->ci}}" >{{$user}} </option> --}}
                    <option value="{{ $tipoMedida->id }}">{{ $tipoMedida->nombre }} </option>
                @endforeach
            </select>
        </div>
        <!--***************************************-->
  <a href="{{route('paciente.index')}}" class="btn btn-danger mb-4" >Cancelar</a>
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
