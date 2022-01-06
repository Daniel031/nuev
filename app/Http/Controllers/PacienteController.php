<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Nutricionista;
use App\Models\Tratamiento;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth');//?

        $this->middleware('can:paciente.index')->only('index');
        $this->middleware('can:paciente.create')->only('create', 'store');
        $this->middleware('can:paciente.edit')->only('edit', 'update');
        $this->middleware('can:paciente.destroy')->only('destroy');
    }
    public function index()
    {
        $pacientes = Paciente::all();
        $personas = Persona::all();
        return view('paciente.index',compact('pacientes','personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nutricionistas = Nutricionista::all();
        $personas = Persona::all();
        return view('paciente.create',compact('nutricionistas','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new Persona();
        $persona->ci = $request->get('ci');
        $persona->nombres = $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->celular = $request->get('celular');
        $persona->tipo = 'P';
        $persona->save();

        $paciente = new Paciente();
        $paciente->id=$persona->id;

        $paciente->nutricionista_id = $request->nutricionista_id;

        $paciente->save();
        return redirect()->route('paciente.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $tratamientos=Tratamiento::where('paciente_id',$paciente->id);
        return view('paciente.show',compact('tratamientos','paciente'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        $nutricionistas = Nutricionista::all();
        $personas = Persona::all();
        return view('paciente.perfil',compact('paciente','personas','nutricionistas'));
        //return $paciente->persona->fechaNacimiento;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Paciente $paciente)
    {
        $persona = Persona::all()->where('id',$paciente->id)->first();
        $persona->ci = $request->get('ci');
        $persona->nombres = $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->celular = $request->get('celular');
        $persona->save();

        $paciente->id=$persona->id;

        $paciente->nutricionista_id = $request->nutricionista_id;

        $paciente->save();
        return redirect()->route('paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $persona = Persona::all()->where('id',$paciente->id)->first();
        $paciente->delete();
        $persona->delete();

        return redirect()->route('paciente.index');

    }
}
