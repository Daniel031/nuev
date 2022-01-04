<?php

namespace App\Http\Controllers;

use App\Models\Nutricionista;
use App\Models\Paciente;
use App\Models\Persona;
use Illuminate\Http\Request;

class NutricionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        // $this->middleware('auth');//?

       $this->middleware('can:nutricionistas.index')->only('index');
        $this->middleware('can:nutricionistas.create')->only('create', 'store');
        $this->middleware('can:nutricionistas.edit')->only('edit', 'update');
        $this->middleware('can:nutricionistas.destroy')->only('destroy');
    }
    public function index()
    {
        $nutricionistas = Nutricionista::all();
        $personas = Persona::all();
        return view('nutricionista.index',compact('nutricionistas','personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $personas = Persona::all();
        return view('nutricionista.create');
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
        $persona->save();

        $paciente = new Nutricionista();
        $paciente->id=$persona->id;
        $paciente->profesion = $request->get('profesion');

        $paciente->save();
        return redirect()->route('nutricionistas.index');
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
    public function edit(Nutricionista $nutricionista)
    {
        $personas = Persona::all();
        return view('nutricionista.edit',compact('nutricionista','personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Nutricionista $nutricionista)
    {
        $persona = Persona::all()->where('id',$nutricionista->id)->first();
        $persona->ci = $request->get('ci');
        $persona->nombres = $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->celular = $request->get('celular');
        $persona->save();

        $nutricionista->id=$persona->id;
        $nutricionista->profesion = $request->get('profesion');

        $nutricionista->save();
        return redirect()->route('nutricionistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nutricionista $nutricionista)
    {
        $persona = Persona::all()->where('id',$nutricionista->id)->first();
        $nutricionista->delete();
        $persona->delete();

        return redirect()->route('nutricionistas.index');
    }
}
