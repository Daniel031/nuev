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
<div class="form-group">
    <form action="">
        <a href="" type="button" class="btn btn-secondary" onclick="crearGrupo()">CREAR GRUPO</a>
        <input type="button" class="btn btn-primary" value="GUARDAR TODO">
        <a href="{{route('paciente.tratamiento.planAlimentacion.index',compact('paciente','tratamiento'))}}" type="button" class="btn btn-danger">CANCELAR</a>
    </form>
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
                                Lunes
                             </td>
                             <td>
                                <input type="checkbox" id = 0>
                             </td>
                        </tr>
                        <tr>
                            <td>
                               Martes
                            </td>
                            <td>
                               <input type="checkbox" id = 1>
                            </td>
                       </tr>
                       <tr>
                        <td>
                           Miercoles
                        </td>
                        <td>
                           <input type="checkbox" id = 2>
                        </td>
                   </tr>
                   <tr>
                    <td>
                       Jueves
                    </td>
                    <td>
                       <input type="checkbox" id = 3>
                    </td>
               </tr>
               <tr>
                <td>
                   Viernes
                </td>
                <td>
                   <input type="checkbox" id =4>
                </td>
           </tr>
           <tr>
            <td>
               Sabado
            </td>
            <td>
               <input type="checkbox" id = 5>
            </td>
       </tr>
       <tr>
        <td>
           Domingo
        </td>
        <td>
           <input type="checkbox" id =6>
        </td>
   </tr>
                 </TBODY>
            </table>
          </div>

          <div class="t">
            <table id ="dias" class="table table-striped table-bordered shadow-lg mt-3">
                <thead class="bg-dark text-white">
        
                    <tr>
                     <th scope="col">Dias del grupo</th>
                    </tr>
                 </thead>
                 <TBODY>
                        <tr>
                             <td>
                 Todos los dias
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
<script language="javascript">

function crearGrupo(){

    var tabla = document.getElementById('dias');
    var tbody = tabla.getElementsByTagName('TBODY');
    var tr =document.createElement('tr');
    var td =document.createElement('td');


    td.appendChild(document.createTextNode("Lunes")); 

    tr.appendChild(td);
    alert('Error');
    tbody.appendChild(tr);

alert('Error');

    }
   /* function load() {
    var blah="Blah!";
   // var t  = document.createElement("table"),
   // tb = document.createElement("tbody"),
   // tr = document.createElement("tr"),
   // td = document.createElement("td");

    t.style.width = "100%";
    t.style.borderCollapse = 'collapse';

    td.appendChild(document.createTextNode(blah)); 

    // note the reverse order of adding child        
    tr.appendChild(td);
    tb.appendChild(tr);
    t.appendChild(tb);

   document.getElementById("theBlah").appendChild(t);
}
*/

</script>    
    
    
@stop
