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
                <option value="">Escoger Plan</option>
                @foreach ($suscripcions as $suscripcion)
                    <option value="{{ $suscripcion->id }}"> {{ $suscripcion->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fechaIni">Fecha de inicio </label>
            <input type="date" class="form-control" id="fechaIni" name="fecha_inicio" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="fechafin">Fecha de finalizacion </label>
            <input type="date" class="form-control" id="fechafin" name="fecha_fin" placeholder="" required disabled value="">
        </div>
        <div>
            <br>
            <a href="{{ url()->previous() }}" class="btn btn-danger mb-4">Cancelar</a>
            <button class="btn btn-primary mb-4" type="submit">Guardar</button>
            @csrf
            @method('post')
        </div>
    </form>

    <script language="javascript">
        function sumarMes(){
            meses= document.getElementById('meses');
            fechaini= document.getElementById('fechaIni');
            // fechafina= (fechaini.getMonth() + meses );
            fechaini.setMonth(fechaini.getMonth() + meses);
            document.getElementById('fechafin').value = fechaini;
        }

    </script>

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
