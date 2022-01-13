<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Persona;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        // $this->middleware('auth');//?

        $this->middleware('can:administradors.index')->only('index');
        $this->middleware('can:administradors.create')->only('create', 'store');
        $this->middleware('can:administradors.edit')->only('edit', 'update');
        $this->middleware('can:administradors.destroy')->only('destroy');
    }

    public function index()
    {
        $administradors = Administrador::all();
        $personas = Persona::all();
        // return $administradors;
        return view('administrador.index',compact('administradors','personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $administradors = Administrador::all();
        $personas = Persona::all();
        return view('administrador.create',compact('administradors','personas'));
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
        $persona->tipo = 'A';
        $persona->save();

        $administradors = new Administrador();
        $administradors->id=$persona->id;
        $administradors->save();
        return redirect()->route('administradors.index');

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
    public function edit(Administrador $administrador)
    {
        $personas = Persona::all();
        return view('administrador.edit',compact('administrador','personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {
        $persona = Persona::all()->where('id',$administrador->id)->first();
        $persona->ci = $request->get('ci');
        $persona->nombres = $request->get('nombres');
        $persona->apellidos= $request->get('apellidos');
        $persona->fechaNacimiento = $request->get('fechaNacimiento');
        $persona->sexo = $request->get('sexo');
        $persona->celular = $request->get('celular');
        $persona->save();

        $administrador->id=$persona->id;
        $administrador->save();
        return redirect()->route('administradors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        $persona = Persona::all()->where('id',$administrador->id)->first();
        $administrador->delete();
        $persona->delete();

        return redirect()->route('administradors.index');
    }
}
