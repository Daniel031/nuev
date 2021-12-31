<?php

namespace App\Http\Controllers;

use App\Models\TipoMedida;
use Illuminate\Http\Request;

class Tipo_medidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipomedidas = TipoMedida::all();
        return view('tipo_medida.index',compact('tipomedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_medida.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoMedida = new TipoMedida();
        $tipoMedida->nombre=$request->nombre;
        $tipoMedida->descripcion =$request->descripcion;
        $tipoMedida->save();
        return redirect()->route('tipoMedida.index');
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
    public function edit(TipoMedida $tipoMedida)
    {
        return view('tipo_medida.edit',compact('tipoMedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TipoMedida $tipoMedida)
    {
        $tipoMedida->nombre = $request->get('nombre');
        $tipoMedida->descripcion = $request->get('descripcion');
        $tipoMedida->save();

        return redirect()->route('tipoMedida.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMedida $tipoMedida)
    {
        $tipoMedida->delete();

        return redirect()->route('tipoMedida.index');
    }
}
