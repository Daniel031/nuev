@extends('adminlte::page')

@section('title', 'CREAR CONSULTA')

@section('content_header')
    <h1>Crear Consulta</h1>
@stop

@section('content')
    <form action="{{ route('consulta.store') }}" method="POST">
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
            <select class="form-control" id="paciente_id" name="paciente_id">
                @foreach ($pacientes as $paciente)
                    <option value={{ $paciente->id }}>
                        {{ $personas->where('id', $paciente->id)->first()->nombres . ' ' . $personas->where('id', $paciente->id)->first()->apellidos }}
                    </option>
                @endforeach

            </select>
        </div>

        <a href="{{ route('consulta.index') }}" class="btn btn-danger mb-4">Cancelar</a>
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
