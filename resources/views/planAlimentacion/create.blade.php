@extends('adminlte::page')

@section('title', 'CREAR PLAN')

@section('content_header')
    <h1>Crear Plan de Alimentacion</h1>
@stop

@section('content')

<form action="{{route('paciente.tratamiento.planAlimentacion.store',compact('paciente','tratamiento'))}}" method="POST"  >

<div class="form-group">
    <label for="fechaInicio">Fecha de inicio </label>
    <input type="date"  class="form-control" id="fechaInicio" name = "fechaInicio" placeholder="Fecha de Inicio" required>
</div>
<div class="form-group">
    <label for="NumeroDeSemanas">Numero de semanas </label>
    <input type="number"  class="form-control" id="numeroDeSemanas" name = "numeroDeSemanas" placeholder="numero de semanas" required value = 1>
</div>
<div class="form-group">
    <label for="Estado">Estado </label>
    <select class="form-control" id="activo" name="activo">
            <option value="true">Activo
            </option>
            <option value="false"> Inactivo
            </option>
    </select>
</div>

@csrf
@method('post')
        <button type="submit" class="btn btn-primary">GUARDAR</button>
        <a href="{{route('paciente.tratamiento.planAlimentacion.index',compact('paciente','tratamiento'))}}" type="button" class="btn btn-danger">CANCELAR</a>


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
                                <input type="checkbox" id = "numero1" name="dia[]" value ="1">
                             </td>
                        </tr>
                        <tr>
                            <td>
                               Martes
                            </td>
                            <td>
                               <input type="checkbox" id ="numero2" name="dia[]" value ="2">
                            </td>
                       </tr>
                       <tr>
                        <td>
                           Miercoles
                        </td>
                        <td>
                           <input type="checkbox" id = "numero3" name="dia[]" value ="3">
                        </td>
                   </tr>
                   <tr>
                    <td>
                       Jueves
                    </td>
                    <td>
                       <input type="checkbox" id = "numero4" name="dia[]" value="4">
                    </td>
               </tr>
               <tr>
                <td>
                   Viernes
                </td>
                <td>
                   <input type="checkbox" id ="numero5" name="dia[]" value="5">
                </td>
           </tr>
           <tr>
            <td>
               Sabado
            </td>
            <td>
               <input type="checkbox" id = "numero6" name="dia[]" value="6">
            </td>
       </tr>
       <tr>
        <td>
           Domingo
        </td>
        <td>
           <input type="checkbox" id ="numero7" name="dia[]" value="7">
        </td>
   </tr>
                 </TBODY>
            </table>
          </div>
 
          </table>
</div>


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
