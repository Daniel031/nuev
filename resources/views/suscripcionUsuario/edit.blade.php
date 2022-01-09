@extends('adminlte::page')

@section('title', 'EDITAR SUSCRIPCION')

@section('content_header')
    <h1>Editar Suscripcion</h1>
@stop

@section('content')
    <form action="{{ route('suscripcionUsuarios.update', compact('suscripcionUsuario')) }}" method="POST">

        <div class="form-group">
            <label for="ci">Plan de suscripcion</label>
            <select class="form-control" aria-label=".form-select-sm example" name="suscripcion_id">
                <option value="{{$suscripcionUsuario->suscripcion_id}}">Mantener Plan</option>
                @foreach ($suscripcions as $suscripcion)
                    <option value="{{ $suscripcion->id }}"> {{ $suscripcion->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombres">Fecha de inicio (año/mes/dia)</label>
            <input type="datetime" class="form-control" id="nombres" name="fecha_inicio" placeholder="" required
                value="{{ $suscripcionUsuario->fecha_inicio }}">
        </div>
        <div class="form-group">
            <label for="apellidos">Fecha de finalización (año/mes/dia)</label>
            <input type="datetime" class="form-control" id="apellidos" name="fecha_fin" placeholder="" required
                value="{{ $suscripcionUsuario->fecha_fin }}">
        </div>
        <div class="form-group">
            <label for="apellidos">Estado</label>
            <select class="form-control" aria-label=".form-select-sm example" name="activo">
                <option value="{{$suscripcionUsuario->activo}}" selected>{{$suscripcionUsuario->activo}}</option>
                <option value="Activado">Activado</option>
                <option value="subsanar pago">subsanar pago</option>
                <option value="desactivado">desactivado</option>
                {{-- <option value=""></option> --}}
            </select>
        </div>
        <div class="">
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="">Pagado</label>
            <select class="form-control" aria-label=".form-select-sm example" name="pagado">
                <option value='1'
                    @php
                        $aux = $suscripcionUsuario->pagado == 1 ? 'selected' : '';
                    @endphp {{$aux}}
                >Pagado</option>
                <option value='0'
                    @php
                        $aux = $suscripcionUsuario->pagado == 0 ? 'selected' : '';
                    @endphp {{$aux}}
                >Impago</option>
            </select>
            <br>
        </div>
           <br>
        <a href="{{ url()->previous() }}" class="btn btn-danger mb-4">Cancelar</a>
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
