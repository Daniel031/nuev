@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1>EDITAR ACTIVIDAD</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.alimento.update', $alimento) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nombre </label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        placeholder="Ingrese el nombre del alimento" aria-describedby="helpId"
                        value="{{ old('nombre', $alimento->nombre) }}">
                    @error('nombre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nombre Común </label>
                    <input type="text" name="nombreComun" id="nombreComun" class="form-control"
                        placeholder="Ingrese el nombre Comun del alimento" aria-describedby="helpId"
                        value="{{ old('nombre', $alimento->nombreComun) }}">
                    @error('nombreComun')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group grid-cols-1 px-3">
                        <label for="">Peso Único (g) </label>
                        <input type="number" size=30 style="width:200px" name="pesoUnico" id="pesoUnico" min="0"
                            class="form-control" placeholder="Ingrese Peso del alimento" aria-describedby="helpId"
                            value="{{ old('nombre', $alimento->pesoUnico) }}">
                        @error('pesoUnico')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-1">
                        <label for="confirmada">Tipo de Alimento</label>
                        <select class="form-control" id="tipoAlimento" name="tipoAlimento">

                               @foreach ($tipoAlimentos as $tip)
                                 <option value={{ $tip->id }} {{($tip->id==$tipo->id)? 'selected':''}} >{{ $tip->nombre }}</option>
                                @endforeach

                        </select>
                    </div>
                </div>
                <font size=5 class="font-semibold py-2 fill-current">MACRONUTRIENTES</font>
                <div class="row">
                    <div class="form-group grid-cols-1 px-1">
                        <label for="">Energía (kcal)</label>
                        <input type="number" size=30 style="width:200px" name="energia" id="energia" min="0"
                            class="form-control" placeholder="Cantidad de energía" aria-describedby="helpId"
                            value="{{ old('energia',$alinut->where('nutriente_id','=',1)->first()->cantidad) }}">
                        @error('energia')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group grid-cols-2 px-1">
                        <label for="" class="font-semibold">Grasa (g)</label>
                        <input type="number" size=30 style="width:200px" name="grasa" id="grasa" min="0"
                            class="form-control" placeholder="Cantidad de grasa" aria-describedby="helpId"
                            value="{{ old('grasa',$alinut->where('nutriente_id','=',2)->first()->cantidad) }}">
                        @error('grasa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">H. Carbono (g)</label>
                        <input type="number" size=30 style="width:200px" name="hCarbono" id="hCarbono" min="0"
                            class="form-control" placeholder="Cantidad H. Carbono" aria-describedby="helpId"
                            value="{{ old('hCarbono',$alinut->where('nutriente_id','=',3)->first()->cantidad) }}">
                        @error('hCarbono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Proteína (g)</label>
                        <input type="number" size=30 style="width:200px" name="proteina" id="proteina" min="0"
                            class="form-control" placeholder="Cantidad Proteína" aria-describedby="helpId"
                            value="{{ old('proteina',$alinut->where('nutriente_id','=',4)->first()->cantidad) }}">
                        @error('proteina')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <font size=5 class="font-semibold py-2">MICRONUTRIENTES</font>
                <div class="row">

                    <div class="form-group grid-cols-1 px-1">
                        <label for="">Colesterol (mg)</label>
                        <input type="number" size=30 style="width:200px" name="colesterol" id="colesterol" min="0"
                            class="form-control" placeholder="Cantidad de Colesterol" aria-describedby="helpId"
                            value="{{ old('colesterol',$alinut->where('nutriente_id','=',5)->first()->cantidad) }}">
                        @error('colesterol')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="" class="font-semibold">Fibra Alimentaria (g)</label>
                        <input type="number" size=30 style="width:200px" name="fibraAlimentaria"
                            id="fibraAlimentaria" min="0" class="form-control" placeholder="Cantidad Fibra Alimentaria"
                            aria-describedby="helpId" value="{{ old('fibraAlimentaria',$alinut->where('nutriente_id','=',6)->first()->cantidad) }}">
                        @error('fibraAlimentaria')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Sodio (mg)</label>
                        <input type="number" size=30 style="width:200px" name="sodio" id="sodio" min="0"
                            class="form-control" placeholder="Cantidad Sodio" aria-describedby="helpId"
                            value="{{ old('sodio',$alinut->where('nutriente_id','=',7)->first()->cantidad) }}">
                        @error('sodio')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Agua (g)</label>
                        <input type="number" size=30 style="width:200px" name="agua" id="agua" min="0"
                            class="form-control" placeholder="Cantidad Agua" aria-describedby="helpId"
                            value="{{ old('agua',$alinut->where('nutriente_id','=',8)->first()->cantidad) }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina A (mg)</label>
                        <input type="number" size=30 style="width:200px" name="vitaminaA" id="VítaminaA" min="0"
                            class="form-control" placeholder="Cantidad Vitamina A" aria-describedby="helpId"
                            value="{{ old('vitaminaA',$alinut->where('nutriente_id','=',9)->first()->cantidad) }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina B6 (mg)</label>
                        <input type="number" size=30 style="width:200px" name="vitaminaB6" id="vitaminaB6" min="0"
                            class="form-control" placeholder="Cantidad Vítamina B6" aria-describedby="helpId"
                            value="{{ old('vitaminaB6',$alinut->where('nutriente_id','=',10)->first()->cantidad) }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina C (mg)</label>
                        <input type="number" size=30 style="width:200px"  name="vitaminaC" id="vitaminaC" min="0"
                            class="form-control" placeholder="Cantidad Vitamina C" aria-describedby="helpId"
                            value="{{ old('vitaminaC',$alinut->where('nutriente_id','=',11)->first()->cantidad) }}">
                        @error('agua')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group grid-cols-2 px-1">
                        <label for="">Vítamina D (mg)</label>
                        <input type="number" size=30 style="width:200px" name="vitaminaD" id="vitaminaD" min="0"
                            class="form-control" placeholder="Cantidad Vitamina D" aria-describedby="helpId"
                            value="{{ old('vitaminaD',$alinut->where('nutriente_id','=',12)->first()->cantidad) }}">
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
