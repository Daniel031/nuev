@extends('adminlte::page')

@section('title', 'EDITAR SUSCRIPCION')

@section('content_header')
    <h1>Editar Suscripcion</h1>
@stop

@section('content')
    <form action="{{ route('suscripcions.update', $suscripcion) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="id" name="nombre" type="text" value="{{ $suscripcion->nombre }}" required autofocus
                autocomplete="id" class="form-control" tabindex="1">
        </div>
        <!--ERROR codigo-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Meses</label>
            <input id="nombre" name="meses" type="number" value="{{ $suscripcion->meses }}" required autofocus
                autocomplete="nombre" class="form-control" tabindex="2">
        </div>
        <!--ERROR nombre-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Costo</label>
            <input id="precio" name="monto_total" type="number" value="{{ $suscripcion->monto_total }}" required
                autofocus autocomplete="precio" class="form-control" tabindex="2">
        </div>
        <!--***************************************-->
        <a href="{{ route('suscripcions.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
