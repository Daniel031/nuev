<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscripcions = Suscripcion::all();
        return view('suscripcion.index',compact('suscripcions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suscripcion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suscripcion= new Suscripcion();
        $suscripcion->nombre = $request->get('nombre');
        $suscripcion->meses = $request->get('meses');
        $suscripcion->monto_total = $request->get('monto_total');
        $suscripcion->save();
        return redirect()->route('suscripcions.index');
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
    public function edit(Suscripcion $suscripcion)
    {
        return view('suscripcion.edit',compact('suscripcion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscripcion $suscripcion)
    {
        $suscripcion->nombre = $request->get('nombre');
        $suscripcion->meses = $request->get('meses');
        $suscripcion->monto_total = $request->get('monto_total');
        $suscripcion->save();
        return redirect()->route('suscripcions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripcion $suscripcion)
    {
        $suscripcion->delete();
        return redirect()->route('suscripcions.index');
    }
}
