@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1>Nutridie</h1>
@stop

@section('content')
    <p> Bienvenido
    </p>
    <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script> console.log('Hi!'); </script>
@stop

{{-- <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
<script src="/js/Chart.js"></script>
    <script> 
        var xValues = ["person", "veter", "controla", "estad", "Software"];
        var yValues = [55, 49, 44, 24, 15];
        var myChart = new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    pointRadius: 4,
                    pointBackgroundColor: "rgba(0,0,255,1)",
                    data: yValues
                }]
            },
            options: {
                title: {
                display: true,
                text: "Grafico De Nutricion "
                }
            }
        });
     console.log('Hi!'); 
     
     </script> --}}
