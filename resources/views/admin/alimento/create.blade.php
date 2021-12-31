@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1> CREAR ALIMENTO SA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.alimento.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Ingrese el nombre del alimento" aria-describedby="helpId"
                        value="{{ old('nombre') }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nombre Común </label>
                    <input type="text" name="nombreComun" id="nombreComun" class="form-control"
                        placeholder="Ingrese el nombre Comun del alimento" aria-describedby="helpId"
                        value="{{ old('nombreComun') }}">
                    @error('nombreComun')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group grid-cols-1 px-3">
                        <label for="">Peso Único (g) </label>
                        <input type="number" size=30 style="width:200px" name="pesoUnico" id="pesoUnico" min="0"
                            class="form-control" placeholder="Ingrese Peso del alimento" aria-describedby="helpId"
                            value="{{ old('pesoUnico') }}">
                        @error('pesoUnico')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-1">
                        <label for="confirmada">Tipo de Alimento</label>
                        <select class="form-control" id="tipoAlimento" name="tipoAlimento">
                            @foreach ($tipoAlimentos as $tipo)
                                <option value={{ $tipo->id }}>{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <font size=5 class="font-semibold py-2 fill-current">MACRONUTRIENTES</font>
                <div class="row">
                    <div class="form-group grid-cols-1 px-1">
                        <label for="">Energía (kcal)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="energia" id="energia" min="0"
                            class="form-control" placeholder="Cantidad de energía" aria-describedby="helpId"
                            value="{{ old('energia') }}">
                        @error('energia')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group grid-cols-2 px-1">
                        <label for="" class="font-semibold">Grasa (g)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="grasa" id="grasa" min="0"
                            class="form-control" placeholder="Cantidad de grasa" aria-describedby="helpId"
                            value="{{ old('grasa') }}">
                        @error('grasa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">H. Carbono (g)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="hCarbono" id="hCarbono" min="0"
                            class="form-control" placeholder="Cantidad H. Carbono" aria-describedby="helpId"
                            value="{{ old('hCarbono') }}">
                        @error('hCarbono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Proteína (g)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="proteina" id="proteina" min="0"
                            class="form-control" placeholder="Cantidad Proteína" aria-describedby="helpId"
                            value="{{ old('proteina') }}">
                        @error('proteina')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <font size=5 class="font-semibold py-2">MICRONUTRIENTES</font>
                <div class="row">

                    <div class="form-group grid-cols-1 px-1">
                        <label for="">Colesterol (mg)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="colesterol" id="colesterol" min="0"
                            class="form-control" placeholder="Cantidad de Colesterol" aria-describedby="helpId"
                            value="{{ old('colesterol') }}">
                        @error('colesterol')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="" class="font-semibold">Fibra Alimentaria (g)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="fibraAlimentaria"
                            id="fibraAlimentaria" min="0" class="form-control" placeholder="Cantidad Fibra Alimentaria"
                            aria-describedby="helpId" value="{{ old('fibraAlimentaria') }}">
                        @error('fibraAlimentaria')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Sodio (mg)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="sodio" id="sodio" min="0"
                            class="form-control" placeholder="Cantidad Sodio" aria-describedby="helpId"
                            value="{{ old('sodio') }}">
                        @error('sodio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Agua (g)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="agua" id="agua" min="0"
                            class="form-control" placeholder="Cantidad Agua" aria-describedby="helpId"
                            value="{{ old('agua') }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina A (mg)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="vitaminaA" id="VítaminaA" min="0"
                            class="form-control" placeholder="Cantidad Vitamina A" aria-describedby="helpId"
                            value="{{ old('vitaminaA') }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina B6 (mg)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="vitaminaB6" id="vitaminaB6" min="0"
                            class="form-control" placeholder="Cantidad Vítamina B6" aria-describedby="helpId"
                            value="{{ old('vitaminaB6') }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina C (mg)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="vitaminaC" id="vitaminaC" min="0"
                            class="form-control" placeholder="Cantidad Vitamina C" aria-describedby="helpId"
                            value="{{ old('vitaminaC') }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina D (mg)</label>
                        <input type="number" size=30 style="width:200px" value="0" name="vitaminaD" id="vitaminaD" min="0"
                            class="form-control" placeholder="Cantidad Vitamina D" aria-describedby="helpId"
                            value="{{ old('vitaminaD') }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="form-group">
                    <a href="{{ route('admin.alimento.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>


@stop
