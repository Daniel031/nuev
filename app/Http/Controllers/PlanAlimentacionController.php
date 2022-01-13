<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\PlanAlimentacion;
use App\Models\Grupo;
use App\Models\Dia;
use App\Models\Tratamiento;
use App\Models\DiaGrupo;

class PlanAlimentacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paciente $paciente,Tratamiento $tratamiento){
        
        $planAlimentacions = PlanAlimentacion::all()->where('tratamiento_id',$tratamiento->id);
        $grupo = Grupo::all();
        $diaGrupo =DiaGrupo::all();
        $dias = Dia::all();

       return view('planAlimentacion.index',compact('paciente','tratamiento','planAlimentacions','grupo','diaGrupo','dias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente,Tratamiento $tratamiento)
    {
        return view('planAlimentacion.create',compact('paciente','tratamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Paciente $paciente,Tratamiento $tratamiento)
    {
        $request->validate([
            'dia' => 'required'
        ]);
        $plan = new PlanAlimentacion();
        $plan->fechaInicio = $request->fechaInicio;
        $plan->fechaFin = date("d-m-Y",strtotime($request->fechaInicio."+ ".$request->numeroDeSemanas." week")); 
        $plan->activo = $request->activo;
        $plan->tratamiento_id = $tratamiento->id;
        $plan->save();
        $grupo = new Grupo();
        $grupo->plan_alimentacion_id =$plan->id;
        $grupo->save();

        for ($i=0; $i <count($request->dia) ; $i++) { 
            $diaGrupo = new DiaGrupo();
            $diaGrupo->dia_id = $request->dia[$i];
            $diaGrupo->grupo_id = $grupo->id;
            $diaGrupo->save();
        }
       

        return redirect()->route('paciente.tratamiento.planAlimentacion.index',compact('paciente','tratamiento'));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente ,Tratamiento $tratamiento,PlanAlimentacion $planAlimentacion)
    {
        $grupo = Grupo::all();
        $diaGrupo =DiaGrupo::all();
        return view('planAlimentacion.edit',compact('grupo','diaGrupo','planAlimentacion','paciente','tratamiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanAlimentacion $planAlimentacion)
    {
        $request->validate([
            'dia' => 'required'
        ]);
        $plan = $planAlimentacion;
        $plan->fechaInicio = $request->fechaInicio;
        $plan->fechaFin = date("d-m-Y",strtotime($request->fechaInicio."+ ".$request->numeroDeSemanas." week")); 
        $plan->activo = $request->activo;
        $plan->tratamiento_id = $request->tratamiento->id;
        $plan->save();
        $grupo = Grupo::all()->where('plan_alimentacion_id',$plan->id)->first();

        $diaGrupos =DiaGrupo::all()->where('grupo_id',$grupo->id);
        foreach ($diaGrupos as $diaGrupo) {
            $diaGrupo->delete();
        }

        for ($i=0; $i <count($request->dia) ; $i++) { 
            $diaGrupo = new DiaGrupo();
            $diaGrupo->dia_id = $request->dia[$i];
            $diaGrupo->grupo_id = $grupo->id;
            $diaGrupo->save();
        }
       

        return redirect()->route('paciente.tratamiento.planAlimentacion.index',compact('paciente','tratamiento'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
