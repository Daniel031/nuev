@extends('adminlte::page')

@section('title', 'CREAR PLAN')

@section('content_header')
    <h1>Crear Plan de Alimentacion</h1>
@stop

@section('content')
<div class="form-group">
    <label for="fechaInicio">Fecha de inicio </label>
    <input type="date"  class="form-control" id="fechaInicio" name = "fechaInicio" placeholder="Fecha de Inicio" required>
</div>
<div class="form-group">
    <label for="NumeroDeSemanas">Numero de semanas </label>
    <input type="number"  class="form-control" id="numeroDeSemanas" name = "numeroDeSemanas" placeholder="numero de semanas" required value = 1>
</div>





    <style>
        #inner { text-align: left; margin: 0 auto; }
        .t { float: left; }
        table { border: 1px solid black; }
      </style>
      

        <div id="inner">


          <div class="t">
            <table  class="table table-striped table-bordered shadow-lg mt-3">
                <thead class="bg-dark text-white">
        
                    <tr>
                     <th scope="col">Dia</th>
                       <th scope="col">Asignar grupo</th>   
                    </tr>
                 </thead>
                 <TBODY>
                        <tr>
                             <td>
                 
                 
         
                             </td>
                        </tr>
                 </TBODY>
            </table>
          </div>

          <div class="t">
            <table  class="table table-striped table-bordered shadow-lg mt-3">
                <thead class="bg-dark text-white">
        
                    <tr>
                     <th scope="col">Dias del grupo</th>
                    </tr>
                 </thead>
                 <TBODY>
                        <tr>
                             <td>
                 
                 
         
                             </td>
                        </tr>
                 </TBODY>
            </table>
          </div>
 
          </table>
        </div>







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
