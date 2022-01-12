<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Consultorio;
use App\Models\ConsultaNutricionista;
use Auth;

class PacienteConsultaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth');//?

        $this->middleware('can:consulta.index')->only('index');
        $this->middleware('can:consulta.create')->only('create', 'store');
        $this->middleware('can:consulta.edit')->only('edit', 'update');
        $this->middleware('can:consulta.destroy')->only('destroy');
    }

    public function index(Paciente $paciente)
    {
        $consultas = Consulta::all()->where('paciente_id',$paciente->id);
        $personas =Persona::all();
        $pacientes = Paciente::all();
        $consultorios =Consultorio::all();

        return view('pacienteConsulta.index',compact('paciente','consultorios','consultas','personas','pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        $consultorios =Consultorio::all();
        $pacientes = Paciente::all();
        $personas = Persona::all();
        return view('pacienteConsulta.create',compact('paciente','consultorios','pacientes','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Paciente $paciente)
    {            
        
        $consulta = new Consulta();
        $consulta->confirmada = $request->confirmada;
        $consulta->motivoConsulta = $request->motivoConsulta;
        $consulta->expectativa = $request->expectativa;
        $consulta->paciente_id = $paciente->id;
        $consulta->save();

        $consultaNut=new ConsultaNutricionista();
        $consultaNut->fecha_hora = $request->fecha_hora;
        $consultaNut->tiempoDeConsulta= $request->tiempoDeConsulta;
        $consultaNut->consultorio_id = $request->consultorio_id;
        $consultaNut->nutricionista_id = Auth::user()->persona_id;
        $consultaNut->consulta_id=$consulta->id;
        $consultaNut->save();

        return redirect()->route('paciente.consulta.index',compact('paciente'));
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
    public function edit(Paciente $paciente,Consulta $consultum)
    {
        $pacientes = Paciente::all();
        $personas = Persona::all();
        $consulta = $consultum;
        $consultorios = Consultorio::all();
        $consultasNutricionistas=ConsultaNutricionista::all();
        
        return view('pacienteConsulta.edit',compact('paciente','consultorios','pacientes','personas','consulta','consultasNutricionistas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Paciente $paciente,Consulta $consultum)
    {
        $consulta=$consultum;
        $consulta->confirmada = $request->confirmada;
        $consulta->motivoConsulta = $request->motivoConsulta;
        $consulta->expectativa = $request->expectativa;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();

        $consultaNut=ConsultaNutricionista::all()->where('consulta_id',$consulta->id)->first();
        $consultaNut->fecha_hora = $request->fecha_hora;
        $consultaNut->tiempoDeConsulta= $request->tiempoDeConsulta;
        $consultaNut->consultorio_id = $request->consultorio_id;
        $consultaNut->nutricionista_id = Auth::user()->persona_id;
        $consultaNut->consulta_id=$consulta->id;
        $consultaNut->save();

        return redirect()->route('paciente.consulta.index',compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente,Consulta $consultum)
    {
        $consultum->delete();
        return redirect()->route('paciente.consulta.index',compact('paciente'));
    }
}
