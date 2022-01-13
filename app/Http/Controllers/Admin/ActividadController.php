<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActividadRequest;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    
    public function __construct(){
        // $this->middleware('auth');//?

        $this->middleware('can:actividads.index')->only('index');
        $this->middleware('can:actividads.create')->only('create', 'store');
        $this->middleware('can:actividads.edit')->only('edit', 'update');
        $this->middleware('can:actividads.destroy')->only('destroy');
    }

    public function index()
    {
        $actividad = Actividad::all();
        $fisica = $actividad->where('tipo', '=', 'F');
        $comentario = $actividad->where('tipo', '=', 'C');
        return view('admin.actividad.index', compact('fisica', 'comentario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.actividad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadRequest $request)
    {
        Actividad::create([
            'nombre' => $request->nombre,
            'MET' => $request->MET,
            'ctte' => 0.0175,
            'tipo' => 'F',
        ]);
        return redirect()->route('admin.actividad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        return view('admin.actividad.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response]
     */
    public function edit(Actividad $actividad)
    {
        return view('admin.actividad.edit', compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadRequest $request, Actividad $actividad)
    {

        $actividad->update($request->all());

        return redirect()->route('admin.actividad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        Actividad::destroy($actividad->id);
        return redirect()->route('admin.actividad.index');
    }
}
