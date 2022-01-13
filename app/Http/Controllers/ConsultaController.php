<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Persona;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth');//?

        $this->middleware('can:consultas.index')->only('index');
        $this->middleware('can:consultas.create')->only('create', 'store');
        $this->middleware('can:consultas.edit')->only('edit', 'update');
        $this->middleware('can:consultas.destroy')->only('destroy');
    }

    public function index()
    {
        $consultas = Consulta::all();
        $personas =Persona::all();
        $pacientes = Paciente::all();

        return view('consulta.index',compact('consultas','personas','pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $personas = Persona::all();
        return view('consulta.create',compact('pacientes','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consulta = new Consulta();
        $consulta->confirmada = $request->confirmada;
        $consulta->motivoConsulta = $request->motivoConsulta;
        $consulta->expectativa = $request->expectativa;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();
        return redirect()->route('consulta.index');
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
    public function edit(Consulta $consultum)
    {
        $pacientes = Paciente::all();
        $personas = Persona::all();
        $consulta = $consultum;
        return view('consulta.edit',compact('pacientes','personas','consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Consulta $consultum)
    {
        $consulta=$consultum;
        $consulta->confirmada = $request->confirmada;
        $consulta->motivoConsulta = $request->motivoConsulta;
        $consulta->expectativa = $request->expectativa;
        $consulta->paciente_id = $request->paciente_id;
        $consulta->save();
        return redirect()->route('consulta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consultum)
    {
        $consultum->delete();
        return redirect()->route('consulta.index');
    }
}
