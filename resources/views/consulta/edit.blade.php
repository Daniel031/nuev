@extends('adminlte::page')

@section('title', 'EDITAR PACIENTE')

@section('content_header')
    <h1>Editar Pacientes</h1>
@stop

@section('content')
    <form action="{{ route('consulta.update', ['consultum' => $consulta]) }}" method="POST">
        <div class="form-group">
            <label for="motivoConsulta">Motivo de la consulta</label>
            <input type="text" class="form-control" id="motivoConsulta" name="motivoConsulta"
                placeholder="motivo de la consulta" required value={{ $consulta->motivoConsulta }}>
        </div>
        <div class="form-group">
            <label for="expectativa">Expectativa </label>
            <input type="text" class="form-control" id="expectativa" name="expectativa" placeholder="expectativas" required
                value={{ $consulta->expectativa }}>
        </div>
        <div class="form-group">
            <label for="confirmada">Confirmada</label>
            <select class="form-control" id="confirmada" name="confirmada">
                @if ($consulta->confirmada == 1)
                    <option selected value=1>Si</option>
                    <option value=0>No</option>
                @else
                    <option value=1>Si</option>
                    <option selected value=0>No</option>
                @endif

            </select>
        </div>


        <div class="form-group">
            <label for="paciente">Paciente</label>
            <select class="form-control" id="paciente_id" name="paciente_id">
                @foreach ($pacientes as $paciente)
                    @if ($paciente->id == $consulta->paciente_id)
                        <option selected value={{ $paciente->id }}>
                            {{ $personas->where('id', $paciente->id)->first()->nombres . ' ' . $personas->where('id', $paciente->id)->first()->apellidos }}
                        </option>
                    @else
                        <option value={{ $paciente->id }}>
                            {{ $personas->where('id', $paciente->id)->first()->nombres . ' ' . $personas->where('id', $paciente->id)->first()->apellidos }}
                        </option>
                    @endif

                @endforeach

            </select>
        </div>

        <a href="{{ route('consulta.index') }}" class="btn btn-danger mb-4">Cancelar</a>
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
