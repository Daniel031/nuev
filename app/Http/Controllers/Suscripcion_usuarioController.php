<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\SuscripcionUsuario;
use App\Models\User;
use Illuminate\Http\Request;

class Suscripcion_usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscripcions = Suscripcion::all();
        $users = User::all();
        // return $users;
        $suscripcionUsuarios = SuscripcionUsuario::all();
        return view('suscripcionUsuario.index',compact('users', 'suscripcionUsuarios', 'suscripcions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suscripcions = Suscripcion::all();
        return view('suscripcionUsuario.create', compact('suscripcions', 'suscripcions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return auth()->user()->id;
        $suscripcionUsuario= new SuscripcionUsuario();
        $suscripcionUsuario->fecha_inicio = $request->get('fecha_inicio');
        $suscripcionUsuario->fecha_fin = $request->get('fecha_fin');
        $suscripcionUsuario->activo = 'En espera';
        $suscripcionUsuario->pagado = false;
        $suscripcionUsuario->user_id = auth()->user()->id;
        $suscripcionUsuario->suscripcion_id = $request->get('suscripcion_id');
        $suscripcionUsuario->save();
        return redirect()->route('suscripcionUsuarios.index');
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
    public function edit(SuscripcionUsuario $suscripcionUsuario)
    {
        $suscripcions = Suscripcion::all();
        return view('suscripcionUsuario.edit',compact('suscripcionUsuario', 'suscripcions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuscripcionUsuario $suscripcionUsuario)
    {
        $suscripcionUsuario->fecha_inicio = $request->get('fecha_inicio');
        $suscripcionUsuario->fecha_fin = $request->get('fecha_fin');
        $suscripcionUsuario->activo = $request->get('activo');
        $suscripcionUsuario->pagado = $request->get('pagado');
        $suscripcionUsuario->suscripcion_id = $request->get('suscripcion_id');
        $suscripcionUsuario->save();
        return redirect()->route('suscripcionUsuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuscripcionUsuario $suscripcionUsuario)
    {
        $suscripcionUsuario->delete();
        return redirect()->route('suscripcionUsuarios.index');
    }
}
