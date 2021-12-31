@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1>MOSTRAR RECETA</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <h1>{{ $receta->nombre }}</h1>
            </div>
            <div class="form-group">
                <label for="">Preparación: </label>
                <label for="" class="form-control">{{ $receta->preparacion }}</label>
            </div>
            <div class="form-group">
                <label for="">Peso: </label>
                <label for="" class="form-control">{{ $receta->peso }} gramos</label>
            </div>
            <div class="form-group">
                <label for="">Porcion: </label>
                <label for="" class="form-control">{{ $receta->porcion }} porcion</label>
            </div>
            <div class="form-group">
                <a href="{{route('admin.receta.edit',$receta->id)}}" class="btn btn-dark" style="width: 100px;height: 50px;">Agregar</a>
                <table id="receta" name="receta" class="table table-striped table-bordered shadow-lg mt-3"
                style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">cantidad(g)</th>
                        <th scope="col">Alimento</th>
                    </tr>
                </thead>
                <TBODY>
                    @foreach ($receta->alimentorecetas as $a)
                        <tr>
                            <td> {{ $a->peso}} </td>
                            <td>{{$a->alimento->nombre}}</td>
                        </tr>
                    @endforeach

                </TBODY>
            </table>

            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#receta').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "Todo"]
                ]
            });
        });
    </script>
    <script>
        console.log('Hi!');
    </script>

@stop
