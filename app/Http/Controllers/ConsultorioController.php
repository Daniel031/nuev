<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Consultorio;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('consultorio.index',compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultorio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $consultorio = new Consultorio();
        $consultorio->nombre =$request->nombre;
        $consultorio->horaAtencion = $request->horaAtencion;
        $consultorio->direccion = $request->direccion;
        $consultorio->nutricionista_id =Auth::user()->persona_id;
        $consultorio->save();
        return redirect()->route('consultorio.index');
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
    public function edit(Consultorio $consultorio)
    {
        return view('consultorio.edit',compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultorio $consultorio)
    {
        $consultorio->nombre =$request->nombre;
        $consultorio->horaAtencion = $request->horaAtencion;
        $consultorio->direccion = $request->direccion;
        $consultorio->nutricionista_id =Auth::user()->persona_id;
        $consultorio->save();

        return redirect()->route('consultorio.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultorio $consultorio)
    {
        $consultorio->delete();
        return redirect()->route('consultorio.index');
    }
}
