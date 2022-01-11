<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Models\Persona;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paciente $paciente)
    {
        $tratamientos= Tratamiento::all()->where('paciente_id',$paciente->id);
        $persona=Persona::where('id',$paciente->id)->first();
        return view('tratamiento.index', compact('tratamientos', 'paciente','persona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        
        return view('tratamiento.create', compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Paciente $paciente,Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->objetivo=$request->objetivo;
        $tratamiento->fechaInicio=$request->fechaInicio;
        $tratamiento->fechaFin=$request->fechaFin;
        $tratamiento->costo=$request->costo;
        $tratamiento->completo=false;
        $tratamiento->activo=$request->activo;
        $tratamiento->paciente_id=$paciente->id;
        $tratamiento->save();
        
        return redirect()->route('paciente.tratamiento.index',compact('paciente'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente,Tratamiento $tratamiento)
    {
     /*   $persona=Persona::where('id',$id)->first();
        $paciente=Paciente::where('id',$id)->first();
        $tratamientos=Tratamiento::where('paciente_id',$id)->get();
        return view('tratamiento.show',compact('tratamientos', 'persona', 'paciente'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente,Tratamiento $tratamiento)
    {
        return view('tratamiento.edit',compact('paciente','tratamiento'));
        //return $paciente->persona->fechaNacimiento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Paciente $paciente,Request $request,tratamiento $tratamiento)
    {
        $tratamiento->objetivo = $request->get('objetivo');
        $tratamiento->fechaInicio = $request->get('fechaInicio');
        $tratamiento->fechaFin= $request->get('fechaFin');
        $tratamiento->costo = $request->get('costo');
        $tratamiento->paciente_id = $paciente->id;
        $tratamiento->completo = $request->get('completo');
        $tratamiento->activo = $request->get('activo');
        $tratamiento->save();
        return redirect()->route('paciente.tratamiento.index',compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente,Tratamiento $tratamiento)
    {
        $tratamiento->delete();

        return redirect()->route('paciente.tratamiento.index',compact('paciente'));
    }
}
