<?php

namespace App\Http\Controllers;

use App\Models\Control;
use App\Models\Paciente;

class ControlActividadController extends Controller
{
    public function index(Paciente $paciente)
    {
        $tratamiento=$paciente->tratamientos->where('completo','=',false)->first();
        $controles=Control::orderBy('fecha','desc')->get();
        $controles=$controles->where('tratamiento_id','=',$tratamiento->id)->where('tipo_control','=',true);
      //  $controles=$controles->where('tipo_control','=',true)->orderBy('fecha','desc')->get();
        return view('admin.actividad.actividadPaciente',compact('paciente','controles'));
    }
}
