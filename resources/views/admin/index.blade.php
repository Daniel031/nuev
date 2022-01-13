@extends('adminlte::page')

@section('title', 'INDEX')

@section('content_header')
    <h1>Nutridiet</h1>
    <p>Software para el control y seguimiento de pacientes, para un nutriologo</p>
@stop

@section('content')
    {{-- @can('update', $post)

    @endcan --}}
    @hasanyrole('administrador|nutricionista')
        <p> Bienvenido
        </p><img src="https://labuenanutricion.com/wp-content/uploads/2020/07/cuando-debe-comer-un-ni%C3%B1o-menos-de-5.jpg"
        alt="" width="100%" height="">
    @else
        {{-- I am not a ADMINISTRADOR... --}}

        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">BIENVENIDO</h1>
                        <br>
                        <p class="card-text">El software de nutrición nº1 para dietistas y nutricionistas</p>
                        <p class="card-text">Nutridiet permite a los dietistas y nutricionistas gestionar sus consultas de
                            nutrición y asegurar el éxito de sus clientes.</p>
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                    <div class="card-body">
                        <h1 class="card-title">PRIMEROS PASOS </h1>
                        <br>
                        <p class="card-text">Registro de datos
                        <p class="card-text">Es necesario que registre sus datos personales, el cual lo puede hacer en el
                            siguiente link.</p>
                        <a href="{{ route('nutricionistas.create') }}" class="btn btn-primary">Registrar datos</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <img src="https://labuenanutricion.com/wp-content/uploads/2020/07/cuando-debe-comer-un-ni%C3%B1o-menos-de-5.jpg"
                            alt="" width="100%" height="">
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                </div>
            </div>
        </div>
    @endhasanyrole
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
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
