<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteActividadRequest;
use App\Models\Actividad;
use App\Models\ActividadControls;
use App\Models\Control;
use App\Models\HistoriaClinica;
use App\Models\Paciente;

class ControlActividadController extends Controller
{
    public function index(Paciente $paciente)
    {

        $tratamiento = $paciente->tratamientos->where('completo', '=', false)->first();
        if ($tratamiento != null) {
            $controles = Control::orderBy('fecha', 'desc')->first();
            $controles = $controles->where('tratamiento_id', '=', $tratamiento->id)->where('tipo_control', '=', true);
            $controles = $controles->where('tipo_control', '=', true)->orderBy('created_at', 'desc')->get();
        } else {
            $controles = Control::all();
        }
        //return $controles->first()->actividadControls;
        $acontrol=ActividadControls::All();
        return view('admin.actividad.actividadPaciente', compact('paciente', 'controles','acontrol'));

    }
    public function create(Paciente $paciente)
    {
        $actividades = Actividad::orderBy('nombre', 'asc')->get();
        $actividades = $actividades->where('tipo', '=', 'F');

        $historialC = HistoriaClinica::all()->where('paciente_id', '=', $paciente->id)->last();
        return view('admin.actividad.crearActividadPaciente', compact('paciente', 'actividades', 'historialC'));
    }
    public function store(PacienteActividadRequest $request, Paciente $paciente)
    {

        $actividades = json_decode($request->json);
        Control::create([
            'fecha' => $request->fecha,
            'tipo_control' => true, //si es true es una actividad, si es false es una medición
            'cumplido' => false, //si es true la actividad ha sido cumplido, false si no ha sido cumplido por el paciente
            'cantidadSemanal' => $request->veces,
            'tratamiento_id' => $paciente->tratamientos->where('completo', '=', false)->first()->id,
            'promedioDiario' => $request->promedio,//promedio de kcal gastadas de todas las actividades por día
            'gastoActividad' => $request->total, //gasto total de toda la actividad en un día

        ]);
        foreach ($actividades as $a) {
            if ($a->unidad == "minuto") {
                $time = $a->tiempo;
            } else {
                $time = $a->tiempo * 60;
            }
            ActividadControls::create([
                'actividad_id' => Actividad::all()->where('nombre', '=', $a->nombre)->first()->id,
                'control_id' => Control::all()->last()->id,
                'tiempoDiario' => $time,
                'fechaHora_establecida' => $request->fecha,
            ]);
        }
        return redirect()->route('paciente.actividad',compact('paciente'));
    }
}
