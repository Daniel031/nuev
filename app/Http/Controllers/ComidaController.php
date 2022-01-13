<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Comida;
use App\Models\Tratamiento;
use App\Models\PlanAlimentacion;
use App\Models\Alimento;
use App\Models\ComidaGrupo;
use App\Models\Grupo;

class ComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paciente $paciente ,Tratamiento $tratamiento,PlanAlimentacion $planAlimentacion)
    {

      /*  $grupos = Grupo::all();
        $comidaGrupos = ComidaGrupo::all();
        $comidas = Comida::all()->where('id',$comidaGrupos->where('grupo_id',$grupos->where('plan_alimentacion_id',$planAlimentacion->id)->first()->id)->first()->comida_id);
        $alimentos = Alimento::all();
        return view('comida.index',compact('paciente','tratamiento','planAlimentacion','comidas','alimentos'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
