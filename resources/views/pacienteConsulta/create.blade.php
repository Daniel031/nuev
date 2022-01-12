@extends('adminlte::page')

@section('title', 'CREAR CONSULTA')

@section('content_header')
    <h1>Crear Consulta</h1>
@stop

@section('content')
    <form action="{{ route('paciente.consulta.store',compact('paciente')) }}" method="POST">
        <div class="form-group">
            <label for="motivoConsulta">Motivo de la consulta</label>
            <input type="text" class="form-control" id="motivoConsulta" name="motivoConsulta"
                placeholder="motivo de la consulta" required>
        </div>
        <div class="form-group">
            <label for="expectativa">Expectativa </label>
            <input type="text" class="form-control" id="expectativa" name="expectativa" placeholder="expectativas"
                required>
        </div>
        <div class="form-group">
            <label for="confirmada">Confirmada</label>
            <select class="form-control" id="confirmada" name="confirmada">
                <option value=1>Si</option>
                <option value=0>No</option>
            </select>
        </div>


        <div class="form-group">
            <label for="paciente">Paciente</label>
            <select class="form-control" id="paciente_id" name="paciente_id" disabled>
                @foreach ($pacientes as $pacient)
                @if ($pacient->id == $paciente->id)
                <option selected value={{ $pacient->id }}>
                    {{ $personas->where('id', $pacient->id)->first()->nombres . ' ' . $personas->where('id', $pacient->id)->first()->apellidos }}
                </option>
            @else
                <option value={{ $pacient->id }}>
                    {{ $personas->where('id', $pacient->id)->first()->nombres . ' ' . $personas->where('id', $pacient->id)->first()->apellidos }}
                </option>
            @endif
                @endforeach

            </select>
        </div>         
        
        <div class="form-group">
            <label for="fecha_hora">Fecha y hora</label>
            <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" placeholder="fecha y hora de consulta"
                required>
        </div>
        <div class="form-group">
            <label for="tiempoDeConsulta">Tiempo de Consulta </label>
            <input type="time" class="form-control" id="tiempoDeConsulta" name="tiempoDeConsulta" placeholder="tiempo de consulta"
                required>
        </div>
        <div class="form-group">
            <label for="paciente">Consultorio</label>
            <select class="form-control" id="consultorio_id" name="consultorio_id">
                @foreach ($consultorios as $consultorio)
                    <option value={{ $consultorio->id }}>
                        {{ $consultorio->nombre }}
                    </option>
                @endforeach

            </select>
        </div>    

        <a href="{{ route('paciente.consulta.index',compact('paciente')) }}" class="btn btn-danger mb-4">Cancelar</a>
        <button class="btn btn-primary mb-4" type="submit">Guardar</button>
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
