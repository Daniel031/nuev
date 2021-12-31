<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecetaRequest;
use App\Models\Alimento;
use App\Models\AlimentoRecetas;
use App\Models\Receta;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alimentos=Alimento::all();
        return view('admin.receta.create',compact('alimentos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetaRequest $request)
    {

        //return $request;
      //$array = json_encode($request->vector,JSON_UNESCAPED_UNICODE);
      $array=json_decode($request->vector[0]);
      Receta::create([
          'nombre'=>$request->nombre,
          'preparacion'=>$request->preparacion,
          'peso'=>$request->peso
      ]);

      foreach($array as $a){
           $AlimentoId=Alimento::all()->where('nombre','=',$a->alimento)->first()->id;
           $RecetaId=Receta::all()->last()->id;
           AlimentoRecetas::create(['peso'=>$a->cantidad,'alimento_id'=>$AlimentoId,'receta_id'=>$RecetaId]);
      }
        //return Alimento::all()->last();

         return redirect()->route('admin.alimento.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta=Receta::all()->find($id);

        return view('admin.receta.show',compact('receta'));
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
        $receta=Receta::all()->find($id);
        $receta->delete();

         return redirect()->route('admin.alimento.index');
    }
}
