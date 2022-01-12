@extends('adminlte::page')

@section('title', 'EDITAR PACIENTE')

@section('content_header')
    <h1>Editar Plan Alimentacion</h1>
@stop

@section('content')

<form action="{{route('paciente.tratamiento.planAlimentacion.update',compact('planAlimentacion','paciente','tratamiento'))}}" method="POST"  >

    <div class="form-group">
        <label for="fechaInicio">Fecha de inicio </label>
        <input type="date"  class="form-control" id="fechaInicio" name = "fechaInicio" placeholder="Fecha de Inicio" required value="{{$planAlimentacion->fechaInicio}}">
    </div>
    @php
        
        $n1 = new DateTime($planAlimentacion->fechaInicio);
        $n2 = new DateTime($planAlimentacion->fechaFin);
        $k = $n1->diff($n2);
        $k = intval($k->format("%d"));
        $k =$k /7;
    @endphp     
    <div class="form-group">
        <label for="NumeroDeSemanas">Numero de semanas </label>
        <input type="number"  class="form-control" id="numeroDeSemanas" name = "numeroDeSemanas" placeholder="numero de semanas" required value = "{{$k}}">
    </div>
    <div class="form-group">
        <label for="Estado">Estado </label>
        <select class="form-control" id="activo" name="activo">
            @if ($planAlimentacion->activo)
            <option value="true" selected>Activo
            </option>
            <option value="false"> Inactivo
            </option>
            @else
            <option value="true">Activo
            </option>
            <option value="false" selected> Inactivo
            </option>
            @endif

        </select>
    </div>
    
    @csrf
    @method('put')
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
                                     @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',1)->first() !=null)
                                     <input type="checkbox" id = "numero1" name="dia[]" value ="1"  checked="checked">
                                     @else
                                     <input type="checkbox" id = "numero1" name="dia[]" value ="1">
                                     @endif

                                 </td>
                            </tr>
                            <tr>
                                <td>
                                   Martes
                                </td>
                                <td>
                                   @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',2)->first() !=null)
                                   <input type="checkbox" id ="numero2" name="dia[]" value ="2" checked="checked">                            
                                   @else
                                   <input type="checkbox" id ="numero2" name="dia[]" value ="2">                                       
                                   @endif

                                </td>
                           </tr>
                           <tr>
                            <td>
                               Miercoles
                            </td>
                            <td>
                                @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',3)->first() !=null)
                                <input type="checkbox" id = "numero3" name="dia[]" value ="3" checked ="checked">                        
                                @else
                                <input type="checkbox" id = "numero3" name="dia[]" value ="3">                                   
                                @endif

                            </td>
                       </tr>
                       <tr>
                        <td>
                           Jueves
                        </td>
                        <td>
                            @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',4)->first() !=null)
                            <input type="checkbox" id = "numero4" name="dia[]" value="4" checked="checked">                           
                            @else
                            <input type="checkbox" id = "numero4" name="dia[]" value="4">                               
                            @endif

                        </td>
                   </tr>
                   <tr>
                    <td>
                       Viernes
                    </td>
                    <td>
                        @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',5)->first() !=null)
                        <input type="checkbox" id ="numero5" name="dia[]" value="5" checked="checked">                            
                        @else
                        <input type="checkbox" id ="numero5" name="dia[]" value="5">                            
                        @endif

                    </td>
               </tr>
               <tr>
                <td>
                   Sabado
                </td>
                <td>
                    @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',6)->first() !=null)
                    <input type="checkbox" id = "numero6" name="dia[]" value="6" checked="checked">                        
                    @else
                    <input type="checkbox" id = "numero6" name="dia[]" value="6">                        
                    @endif

                </td>
           </tr>
           <tr>
            <td>
               Domingo
            </td>
            <td>
                @if ($diaGrupo->where('grupo_id',$grupo->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->where('dia_id',7)->first() !=null)
                <input type="checkbox" id ="numero7" name="dia[]" value="7" checked="checked">                    
                @else
                <input type="checkbox" id ="numero7" name="dia[]" value="7">                    
                @endif

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
         "lengthMenu":[[5,10,50,-1],[5,10,50,"Todo"]]
     });
 } );
</script>
@stop