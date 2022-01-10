<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteActividadRequest;
use App\Models\Actividad;
use App\Models\Control;
use App\Models\Paciente;

class ControlActividadController extends Controller
{
    public function index(Paciente $paciente)
    {

        $tratamiento=$paciente->tratamientos->where('completo','=',false)->first();
        if ($tratamiento!=null) {
            $controles=Control::orderBy('fecha', 'desc')->first();
            $controles=$controles->where('tratamiento_id', '=', $tratamiento->id)->where('tipo_control', '=', true);
            $controles=$controles->where('tipo_control','=',true)->orderBy('fecha','desc')->get();
        }else{
            $controles=[];
        }
        return view('admin.actividad.actividadPaciente',compact('paciente','controles'));

    }
    public function create(Paciente $paciente){
        $actividades=Actividad::orderBy('nombre','asc')->get();
        return view('admin.actividad.crearActividadPaciente',compact('paciente','actividades'));
    }
    public function store(PacienteActividadRequest $request, Paciente $paciente){

    }
}
