<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlimentoRequest;
use App\Models\Alimento;
use App\Models\AlimentoNutrientes;
use App\Models\Nutriente;
use App\Models\Receta;
use App\Models\RecetaNutriente;
use App\Models\TipoAlimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    
    public function __construct(){
        // $this->middleware('auth');//?

        $this->middleware('can:alimentos.index')->only('index');
        $this->middleware('can:alimentos.create')->only('create', 'store');
        $this->middleware('can:alimentos.edit')->only('edit', 'update');
        $this->middleware('can:alimentos.destroy')->only('destroy');
    }

    public function index()
    {
        $alimentos = Alimento::all();
       // $alimentonutriente = AlimentoNutrientes::all();
        $recetas = Receta::All();
        //$recetanutrientes=RecetaNutriente::all();
        return view('admin.alimento.index', compact('alimentos', 'recetas'));
    // return $recetas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAlimentos = TipoAlimento::all();
        return view('admin.alimento.create', compact('tipoAlimentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlimentoRequest $request)
    {
        $alimento = ([
            'nombre' => $request->nombre,
            'nombreComun' => $request->nombreComun,
            'pesoUnico' => $request->pesoUnico,
            'tipo_alimento_id' => $request->tipoAlimento,
        ]);
        Alimento::create($alimento);
        $a = Alimento::all();
        $n = Nutriente::all();
        $macronutrientes = ([
            [
                'cantidad' => $request->energia,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Energía')->first()->id,
            ],
            [
                'cantidad' => $request->grasa,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Grasa')->first()->id,
            ],
            [
                'cantidad' => $request->hCarbono,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'H. Carbono')->first()->id,
            ],
            [
                'cantidad' => $request->proteina,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Proteína')->first()->id,
            ],
        ]);
        foreach ($macronutrientes as $mac) {
            AlimentoNutrientes::create($mac);
        }
        $micronutrientes = ([
            [
                'cantidad' => $request->colesterol,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Colesterol')->first()->id,
            ],
            [
                'cantidad' => $request->fibraAlimentaria,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Fibra alimentaria')->first()->id,
            ],
            [
                'cantidad' => $request->sodio,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Sodio')->first()->id,
            ],
            [
                'cantidad' => $request->agua,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Agua')->first()->id,
            ],
            [
                'cantidad' => $request->vitaminaA,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Vitamina A')->first()->id,
            ],
            [
                'cantidad' => $request->vitaminaB6,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Vitamina B6')->first()->id,
            ],
            [
                'cantidad' => $request->vitaminaC,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Vitamina C')->first()->id,
            ],
            [
                'cantidad' => $request->vitaminaD,
                'alimento_id' => $a->last()->id,
                'nutriente_id' => $n->where('nombre', '=', 'Vitamina D')->first()->id,
            ],
        ]);
        foreach ($micronutrientes as $mic) {
            AlimentoNutrientes::create($mic);
        }

        return redirect()->route('admin.alimento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Alimento $alimento)
    {
        $nutrientes = Nutriente::all();
        $alnu = AlimentoNutrientes::all();
        $tipo = TipoAlimento::all();
        return view('admin.actividad.show', compact('alimento', 'nutrientes', 'alnu', 'tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Alimento $alimento)
    {
        $tipoAlimentos = TipoAlimento::all();
        $tipo = $tipoAlimentos->find($alimento->tipo_alimento_id);
        $alinut = $alimento->alimentonutrientes;
        //return $alinut;
        return view('admin.alimento.edit', compact('alimento', 'tipoAlimentos', 'tipo', 'alinut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlimentoRequest $request, Alimento $alimento)
    {
        $aliment = ([
            'nombre' => $request->nombre,
            'nombreComun' => $request->nombreComun,
            'pesoUnico' => $request->pesoUnico,
            'tipo_alimento_id' => $request->tipoAlimento,
        ]);
        $alimento->update($aliment);
        $macronutrientes = ([
            [
                'cantidad' => $request->energia,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 1,
            ],
            [
                'cantidad' => $request->grasa,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 2,
            ],
            [
                'cantidad' => $request->hCarbono,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 3,
            ],
            [
                'cantidad' => $request->proteina,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 4,
            ],
        ]);
        $c = 1;
        foreach ($macronutrientes as $mac) {
            //AlimentoNutrientes::create($mac);
            $aux = AlimentoNutrientes::all()->where('alimento_id', '=', $alimento->id)->where('nutriente_id', '=', $c)->first();
            $aux->update($mac);
            $c = $c + 1;
        }
        $micronutrientes = ([
            [
                'cantidad' => $request->colesterol,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 5,
            ],
            [
                'cantidad' => $request->fibraAlimentaria,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 6,
            ],
            [
                'cantidad' => $request->sodio,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 7,
            ],
            [
                'cantidad' => $request->agua,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 8,
            ],
            [
                'cantidad' => $request->vitaminaA,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 9,
            ],
            [
                'cantidad' => $request->vitaminaB6,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 10,
            ],
            [
                'cantidad' => $request->vitaminaC,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 11,
            ],
            [
                'cantidad' => $request->vitaminaD,
                'alimento_id' => $alimento->id,
                'nutriente_id' => 12,
            ],
        ]);
        foreach ($micronutrientes as $mic) {
            //AlimentoNutrientes::create($mac);
            $aux = AlimentoNutrientes::all()->where('alimento_id', '=', $alimento->id)->where('nutriente_id', '=', $c)->first();
            $aux->update($mic);
            $c = $c + 1;
        }
        return redirect()->route('admin.alimento.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alimento $alimento)
    {
        $alimento->delete();
        return redirect()->route('admin.alimento.index');
    }
}
