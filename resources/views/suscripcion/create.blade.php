@extends('adminlte::page')

@section('title', 'CREAR SUSCRIPCION')

@section('content_header')
    <h1>Crear Suscripcion</h1>
@stop

@section('content')
    <form action="{{ route('suscripcions.store') }}" method="POST">
        @csrf
        @if (count($errors) > 0)
            <div class="alert alert-danger" rote="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>

        @endif
        <div class="mb-3">
            <label for="" class="col-form-labelel">Nombre</label>
            <input id="nombre" name="nombre" type="text" step="any" value="" class="form-control" tabindex="1" required
                autofocus autocomplete="codigo">
        </div>
        <!--ERROR NOmbre-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Meses</label>
            <input id="meses" name="meses" type="number" class="form-control" tabindex="2" required autofocus
                autocomplete="descripcion">
        </div>
        <!--ERROR correo electronico-->

        <!--***************************************-->
        <div class="mb-3">
            <label for="" class="col-form-label">Costo</label>
            <input id="monto_total" name="monto_total" type="number" step="any" class="form-control" tabindex="3" required
                autofocus autocomplete="sueldo">
            <!--***************************************-->
        </div>
        <!--***************************************-->

        <a href="{{ route('suscripcions.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-outline-success" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
