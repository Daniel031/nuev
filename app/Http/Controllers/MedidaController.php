<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use App\Models\TipoMedida;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadMedidas = UnidadMedida::all();
        $tipoMedidas = TipoMedida::all();
        $medidas = Medida::all();
        return view('medida.index',compact('unidadMedidas','tipoMedidas', 'medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadMedidas = UnidadMedida::all();
        $tipoMedidas = TipoMedida::all();
        return view('medida.create',compact('unidadMedidas','tipoMedidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medidas = new Medida();
        $medidas->nombre = $request->get('nombre');
        $medidas->u_medida = $request->get('u_medida');
        $medidas->tipo_medida_id= $request->get('tipo_medida_id');
        $medidas->save();
        return redirect()->route('medida.index');

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
    public function edit(Medida $medida)
    {
        $unidadMedidas = UnidadMedida::all();
        $tipoMedidas = TipoMedida::all();
        return view('medida.edit',compact('unidadMedidas','tipoMedidas', 'medida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Medida $medida)
    {
        
        $medida->nombre=$request->nombre;
        $medida->tipo_medida_id = $request->get('tipo_medida_id');
        $medida->u_medida = $request->get('u_medida');

        $medida->save();
        return redirect()->route('medida.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medida $medida)
    {
        
        $medida->delete();

        return redirect()->route('medida.index');
    }
}
