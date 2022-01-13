@extends('adminlte::page')

@section('title', 'Crear Actividad Paciente')

@section('content_header')
    <h1>MOSTRAR ACTIVIDADES PACIENTE</h1>
@stop

@section('content')
    <div class="card mb-3">

        <div class="card-header">
            <div class="row g-3">
                <div class="col-auto">
                    <label class="text-bold">Paciente: </label>
                </div>
                <div class="col-auto">
                    <p> {{ $paciente->persona->nombres }}
                        {{ $paciente->persona->apellidos }}</p>
                </div>
                <div class="col-auto">
                    <label class="text-bold">Peso: </label>
                </div>
                <div class="col-auto">
                    <p>{{ $historialC->peso }} kg</p>
                </div>
                <table id="tabla" name="actividad" class="table table-success table-dark">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Actividad</th>
                            <th>MET</th>
                            <th>Tiempo ejercicio</th>
                            <th>Unidad</th>
                            <th>Gasto Energético Diario(kcal)</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ac as $a)
                            <tr>

                                <td>{{ $a->actividad->nombre }}</td>
                                <td>{{$a->actividad->MET}}</td>
                                @if ($a->tiempoDiario > 60)
                                    <td>{{ $a->tiempoDiario / 60 }}</td>
                                    <td>horas</td>
                                @else
                                    <td>{{ $a->tiempoDiario }}</td>
                                    <td>min</td>
                                @endif

                                <td>{{ $a->actividad->MET * 0.0175 * $historialC->peso * $a->tiempoDiario }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-6" style="background:cadetblue;height: 40px;text-align: center">
                    <label style="color:#000 ;">Gasto
                        Energético Diario Total(kcal)</label>
                </div>
                <div class="col-6" style="background: lightskyblue ;height: 40px;text-align: center;">
                    <label style="color:#000;">Gasto
                        Energético Promedio por actividad(kcal)</label>
                </div>


                <div class="col-6" style="background:cadetblue;height: 40px;text-align: center">
                    {{-- <label class="text-bold" style="color: #606061 ;">0</label> --}}
                    <input id="total" name="total" readonly type="number" class="text-bold" style="color: #606061 ;"
                        value=0>
                </div>
                <div class="col-6" style="background: lightskyblue;height: 40px;text-align: center; ">
                    {{-- <label class="text-bold" style="color: #606061;">0</label> --}}
                    <input id="promedio" name="promedio" readonly type="number" value=0 class="text-bold"
                        style="color: #606061;">
                </div>


            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script type="text/javascript">
        let suma = 0;

        let c=0;
        let tot = document.getElementById('total');
        let t = document.getElementById('tabla');
        let prom = document.getElementById('promedio');

        for (let index = 1; index < t.rows.length; index++) {

            suma = suma + parseFloat(t.rows[index].cells[4].innerHTML)

            c = c + 1;
            tot.value = suma;

            prom.value = suma / c;

        };
    </script>
@stop
