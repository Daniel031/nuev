<?php

namespace App\Observers;

use App\Models\Alimento;
use App\Models\AlimentoNutrientes;
use App\Models\AlimentoRecetas;
use App\Models\Nutriente;
use App\Models\Receta;
use App\Models\RecetaNutrientes;


class AlimentoRecetasObserver
{
    /**
     * Handle the AlimentoRecetas "created" event.
     *
     * @param  \App\Models\AlimentoRecetas  $alimentoRecetas
     * @return void
     */
    public function created(AlimentoRecetas $alimentoRecetas)
    {
        $alimento = Alimento::all()->find($alimentoRecetas->alimento_id);
        $receta = Receta::all()->find($alimentoRecetas->receta_id);
        $nutrientes = Nutriente::all();
        foreach ($nutrientes as $n) {
            $c = (((AlimentoNutrientes::all()->where('alimento_id', '=', $alimento->id)->where('nutriente_id', '=', $n->id)->first()->cantidad) * (AlimentoRecetas::all()->where('alimento_id', '=', $alimento->id)->where('receta_id', '=', $receta->id)->first()->peso)) / ($alimento->pesoUnico));
            if (count($receta->recetanutrientes) == 0) {
                RecetaNutrientes::create(['cantidad' => $c, 'nutriente_id' => $n->id, 'receta_id' => $receta->id]);
            } else {
                $rn = RecetaNutrientes::all()->where('nutriente_id', '=', $n->id)->where('receta_id','=',$receta->id)->first();
                $rn->cantidad=$rn->cantidad+$c;
                $rn->save();
            }
        }
    }
    /**
     * Handle the AlimentoRecetas "updated" event.
     *
     * @param  \App\Models\AlimentoRecetas  $alimentoRecetas
     * @return void
     */
    public function updated(AlimentoRecetas $alimentoRecetas)
    {
        //
    }
    /**
     * Handle the AlimentoRecetas "deleted" event.
     *
     * @param  \App\Models\AlimentoRecetas  $alimentoRecetas
     * @return void
     */
    public function deleting(AlimentoRecetas $alimentoRecetas)
    {
        $alimento = Alimento::all()->find($alimentoRecetas->alimento_id);
        $receta = Receta::all()->find($alimentoRecetas->receta_id);
        $nutrientes = Nutriente::all();
        foreach ($nutrientes as $n) {
            $c = (((AlimentoNutrientes::all()->where('alimento_id', '=', $alimento->id)->where('nutriente_id', '=', $n->id)->first()->cantidad) * (AlimentoRecetas::all()->where('alimento_id', '=', $alimento->id)->where('receta_id', '=', $receta->id)->first()->peso)) / ($alimento->pesoUnico));
                $rn = RecetaNutrientes::all()->where('nutriente_id', '=', $n->id)->where('receta_id','=',$receta->id)->first();
                $rn->cantidad=$rn->cantidad-$c;
                $rn->save();
        }
    }
    /**
     * Handle the AlimentoRecetas "restored" event.
     *
     * @param  \App\Models\AlimentoRecetas  $alimentoRecetas
     * @return void
     */
    public function restored(AlimentoRecetas $alimentoRecetas)
    {
        //
    }
    /**
     * Handle the AlimentoRecetas "force deleted" event.
     *
     * @param  \App\Models\AlimentoRecetas  $alimentoRecetas
     * @return void
     */
    public function forceDeleted(AlimentoRecetas $alimentoRecetas)
    {
        //
    }
}
