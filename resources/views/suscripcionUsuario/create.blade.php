@extends('adminlte::page')

@section('title', 'CREAR SUSCRIPCION')

@section('content_header')
    <h1>Crear Suscripcion</h1>
@stop

@section('content')
    <form action="{{ route('suscripcionUsuarios.store') }}" method="POST">

        <div class="form-group">
            <label for="ci">Plan de suscripcion</label>
            <select class="form-control" aria-label=".form-select-sm example" name="suscripcion_id" id="meses" onclick="sumarMes()">
                {{-- <option value="1">Escoger Plan</option> --}}
                @foreach ($suscripcions as $suscripcion)
                    <option value="{{ $suscripcion->id }}">Plan {{ $suscripcion->nombre }}, duracion mensual:  {{$suscripcion->meses}}, costo del plan: {{$suscripcion->monto_total}} $$</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fechaIni">Fecha de inicio </label>
            <input type="text" class="form-control" id="fechaIni" name="" placeholder="" required disabled 
            value="<?php echo date('d')." - ".date("m")." - ".date("Y") ; ?>"
            >
        </div>
        <div class="form-group">
            <label for="persona">Nutricionista</label>
            <select class="form-control" aria-label=".form-select-sm example" name="persona_id" id="persona">
                {{-- <option value="1">Escoger Plan</option> --}}
                @foreach ($personas as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->nombres }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <br>
            <a href="{{ url()->previous() }}" class="btn btn-danger mb-4">Cancelar</a>
            <button class="btn btn-primary mb-4" type="submit">Guardar</button>
            @csrf
            @method('post')
        </div>
    </form>

    {{-- <script language="javascript">
        let fecha = new Date();
        // document.getElementById('fechaIni').setAttribute('min', {{}});

        function sumarMes() {
            // meses= document.getElementById('suscripcion_id').value;
            fechaini = document.getElementById('fechaIni').value;
            // fechafina= (fechaini.getMonth() + meses );
            // fechaini.setMonth(fechaini.getMonth() + meses);
            document.getElementById('paq').value = 5;
        }
    </script> --}}

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
