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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->objetivo=$request->objetivo;
        $tratamiento->fechaInicio=$request->fechaInicio;
        $tratamiento->fechaFin=$request->fechaFin;
        $tratamiento->costo=$request->consto;
        $tratamiento->completo->$request->completo;



        $table->id();
        $table->text('objetivo');
        $table->date('fechaInicio');
        $table->date('fechaFin');
        $table->decimal('costo');
        $table->boolean('completo');
        $table->foreignId('paciente_id')->references('id')->on('pacientes')
        ->onUpdate('cascade')->onDelete('cascade');
        $table->timestamps();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        $paciente=Paciente::where('id',$tratamiento->paciente_id)->first();
        $tratamientos=Tratamiento::where('paciente_id',$paciente->id);
        return view('tratamiento.show',compact('tratamientos','paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
