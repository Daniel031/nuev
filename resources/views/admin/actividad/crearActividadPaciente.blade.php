@extends('adminlte::page')

@section('title', 'Crear Actividad Paciente')

@section('content_header')
    <h1>ACTIVIDAD PACIENTE</h1>
@stop

@section('content')
    <div class="card">
        <h5 class="card-header">Crear Actividad Paciente</h5>
        <form id="form" action="{{ route('paciente.actividadStore', compact('paciente')) }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="row g-3">
                    <div clas="col-auto">
                        <label class="text-bold">Paciente: </label>
                    </div>
                    <div clas="col-auto">
                        <p> {{ $paciente->persona->nombres }}
                            {{ $paciente->persona->apellidos }}</p>
                    </div>
                    <div class="col-auto">
                        <label class="text-bold">Paciente: </label>
                    </div>
                    <div clas="col-auto">
                        <p>{{ $historialC->peso }} kg</p>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-auto">
                        <label for="staticEmail2">Fecha: </label>
                        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}">
                        @error('fecha')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <label for="staticEmail2" class="px-1">Actividad: </label>
                        <select name="actividad" id="actividad">

                            @foreach ($actividades as $actividad)
                                <option value="{{ $actividad }}">{{ $actividad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <label for="staticEmail2">Veces Semanal: </label>
                        <input type="number" name="veces" id="veces" value="1" min=1 max=7 value="{{ old('veces') }}">
                        @error('veces')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="col-auto" id="selectMin">
                        <label for="staticEmail2" class="px-1">Tiempo: </label>
                        <select name="tiempo" id="tiempo">
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
                        <select name="tiempoh" id="tiempoh">
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
                <div class="row px-2">
                    <a href="" id="add" class="btn btn-primary col-8" style="height: 80px; background: blue"><i
                            class="
                        fas fa-plus fa-4x"></i></a>
                    <button type="submit" id="save" class="btn btn-outline-light col-4"
                        style="height: 80px; background: red"><i
                            class="
                            fas fa-save fa-4x"></i></button>
                </div>
                <table id="tabla" name="actividad" class="table table-success table-dark">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Actividad</th>
                            <th>Tiempo ejercicio</th>
                            <th>Unidad</th>
                            <th>Gasto Energético Diario(kcal)</th>

                            <th>opciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <div class="row px-2">
                    <div class="col-6" style="background:cadetblue;height: 40px;text-align: center">
                        <label style="color:#000 ;">Gasto
                            Energético Diario Total(kcal)</label>
                    </div>
                    <div class="col-6" style="background: lightskyblue ;height: 40px;text-align: center;">
                        <label style="color:#000;">Gasto
                            Energético Promedio por actividad(kcal)</label>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="col-6" style="background:cadetblue;height: 40px;text-align: center">
                        {{-- <label class="text-bold" style="color: #606061 ;">0</label> --}}
                        <input id="total" name="total"  readonly type="number" class="text-bold" style="color: #606061 ;"
                            value=0>
                    </div>
                    <div class="col-6" style="background: lightskyblue;height: 40px;text-align: center; ">
                        {{-- <label class="text-bold" style="color: #606061;">0</label> --}}
                        <input id="promedio" name="promedio"  readonly type="number" value=0 class="text-bold"
                            style="color: #606061;">
                    </div>
                </div>
                <input id="json" name="json" type="hidden" value="">

        </form>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script type="text/javascript">
        console.log('Hi!');

        function Minuto() {
            document.getElementById("selectMin").style.display = ""; // show
            document.getElementById("selectHora").style.display = "none";
        }

        function Hora() {
            document.getElementById("selectMin").style.display = "none"; // hidden
            document.getElementById("selectHora").style.display = ""; //show
        }
        let c = 0;
        let suma = 0;
        (function load() {
            //function plus(){
            const form = document.getElementById("form");
            const btnAdd = document.getElementById("add");
            const btnSave = document.getElementById("save");
            let tabla = document.getElementById("tabla");
            btnAdd.addEventListener("click", function(event) {
                let formdata = new FormData(form)
                event.preventDefault();
                let row = tabla.insertRow(-1);
                let cell0 = row.insertCell(0);
                let obj = formdata.get('actividad');

                cell0.textContent = Object.values(JSON.parse(obj))[1]

                let cell1 = row.insertCell(1);
                cell1.textContent = formdata.get('tiempo')
                let cell2 = row.insertCell(2);
                var radio = document.getElementsByName('Radio');
                var medida
                for (i = 0; i < radio.length; i++) {
                    if (radio[i].checked) {
                        medida = radio[i].id;
                        cell2.textContent = medida;
                    }
                }

                let cell3 = row.insertCell(3);
                let time = document.getElementById('Radio');
                if (medida == "minuto") {
                    cell3.textContent = Object.values(JSON.parse(obj))[2] * 0.0175 * "<?php echo $historialC->peso; ?>" *
                        formdata.get(
                            'tiempo');
                } else {
                    cell3.textContent = Object.values(JSON.parse(obj))[2] * 0.0175 * "<?php echo $historialC->peso; ?>" *
                        formdata.get(
                            'tiempoh') * 60;
                }
                let newDeleteCell = row.insertCell(4);
                let deleteButton = document.createElement("button");
                deleteButton.textContent = "Eliminar";
                newDeleteCell.appendChild(deleteButton);

                let tot = document.getElementById('total');
                let prom = document.getElementById('promedio');

                deleteButton.addEventListener("click", (event) => {
                    let menos = parseFloat(event.target.parentNode.parentNode.cells[3].innerHTML);
                    suma = suma - menos;
                    event.target.parentNode.parentNode.remove();
                    tot.value = suma;
                    c = c - 1;
                    if (c == 0) {
                        prom.value = 0;
                    } else {
                        prom.value = suma / c;
                    }
                })

                let t = document.getElementById('tabla');
                let n = t.rows.length - 1;
                suma = suma + parseFloat(t.rows[n].cells[3].innerHTML)
                c = c + 1;
                tot.value = suma;
                prom.value = suma / c;
            });
            //}
            btnSave.addEventListener("click", function(event) {
                let array = [];
                for (let i = 1; i < tabla.rows.length; i++) {
                    const tab = {
                        nombre: tabla.rows[i].cells[0].innerHTML,
                        tiempo: tabla.rows[i].cells[1].innerHTML,
                        unidad: tabla.rows[i].cells[2].innerHTML,
                        gasto: tabla.rows[i].cells[3].innerHTML,
                    }
                    array.push(tab);
                }
                //alert(JSON.stringify(array));
                let json = document.getElementById('json');
                json.value = JSON.stringify(array);
                //alert(JSON.stringify(tb));

            });
            //

        })()
    </script>
@stop
