@extends('adminlte::page')

@section('title', 'Crear Actividad Paciente')

@section('content_header')
    <h1> CREAR NUEVA ACTIVIDAD PACIENTE</h1>
@stop

@section('content')
    <div class="card">
        <h5 class="card-header">Crear Actividad</h5>
        <form action="{{ route('paciente.actividadStore', compact('paciente')) }}" method="POST">

            @csrf

            <div class="card-body">
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="staticEmail2">Fecha: </label>
                        <input type="date" name="fecha" id="fecha">
                    </div>
                    <div class="col-auto">
                        <label for="staticEmail2" class="px-1">Actividad: </label>
                        <select name="actividad" id="actividad">
                            @foreach ($actividades as $actividad)
                                <option value="{{ $actividad->id }}">{{ $actividad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="staticEmail2">Veces Semanal: </label>
                        <input type="number" name="veces" id="veces" value="1" min=1 max=7>

                    </div>
                    <div class="col-auto" id="selectMin">
                        <label for="staticEmail2" class="px-1">Tiempo: </label>
                        <select name="actividad" id="actividad">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </div>

                    <div class="col-auto" id="selectHora" style="display:none">
                        <label for="staticEmail2" class="px-1">Tiempo: </label>
                        <select name="actividad" id="actividad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option vsalue="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Radio" id="minuto" value="minuto" checked
                                onclick="Minuto()">
                            <label class="form-check-label" for="inlineRadio1">min</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Radio" id="hora" value="hora"
                                onclick="Hora()">
                            <label class="form-check-label" for="inlineRadio2">hrs</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <a href="" class="btn btn-primary col-sm" onclick="plus()"><i class="fas fa-plus"></i></a>
                </div>
                <div class="row g-3">
                    <table id="tabla" name="tabla" class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>Actividad</th>
                                <th>Tiempo</th>
                                <th>Gasto Energético</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

        function Minuto() {
            document.getElementById("selectMin").style.display = ""; // show
            document.getElementById("selectHora").style.display = "none";
        }

        function Hora() {
            document.getElementById("selectMin").style.display = "none"; // hidden
            document.getElementById("selectHora").style.display = ""; //show
        }

        function plus() {
            let tabla=document.getElementById('tabla');
            let tbody=tabla.getElementsByTagName("tbody");

            let row_2 = document.createElement('tr');
            let row_2_data_1 = document.createElement('td');
            row_2_data_1.innerHTML = "1.";
            let row_2_data_2 = document.createElement('td');
            row_2_data_2.innerHTML = "James Clerk";
            let row_2_data_3 = document.createElement('td');
            row_2_data_3.innerHTML = "Netflix";

            row_2.appendChild(row_2_data_1);
            row_2.appendChild(row_2_data_2);
            row_2.appendChild(row_2_data_3);

            tbody.appendChild(row_2);
        }
    </script>


@stop
