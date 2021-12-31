<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadMedida;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        // $this->middleware('auth');//?

 /*       $this->middleware('can:unidadMedida.index')->only('index');
        $this->middleware('can:unidadMedida.create')->only('create', 'store');
        $this->middleware('can:unidadMedida.edit')->only('edit', 'update');
        $this->middleware('can:unidadMedida.destroy')->only('destroy');*/
    }
    public function index()
    {

        $unidadMedidas = UnidadMedida::all();
        return view('unidadMedida.index',compact('unidadMedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidadMedida.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidadMedida= new UnidadMedida();
        $unidadMedida->nombre = $request->get('nombre');
        $unidadMedida->abreviacion = $request->get('abreviacion');
        $unidadMedida->save();

        return redirect()->route('unidadMedida.index');
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
    public function edit(UnidadMedida $unidadMedida)
    {
        return view('unidadMedida.edit',compact('unidadMedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UnidadMedida $unidadMedida)
    {
        $unidadMedida->nombre = $request->get('nombre');
        $unidadMedida->abreviacion = $request->get('abreviacion');
        $unidadMedida->save();

        return redirect()->route('unidadMedida.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $unidadMedida)
    {
       $unidadMedida->delete();
       return redirect()->route('unidadMedida.index');
    }
}
