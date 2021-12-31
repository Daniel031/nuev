<?php

namespace App\Observers;

use App\Models\Alimento;
use App\Models\AlimentoNutrientes;
use App\Models\AlimentoRecetas;
use App\Models\Nutriente;
use App\Models\Receta;
use App\Models\RecetaNutrientes;

class AlimentoObserver
{
    /**
     * Handle the Alimento "created" event.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return void
     */
    public function created(Alimento $alimento)
    {
        //
    }

    /**
     * Handle the Alimento "updated" event.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return void
     */
    public function updated(Alimento $alimento)
    {
        //
    }

    /**
     * Handle the Alimento "deleted" event.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return void
     */
    public function deleting(Alimento $alimento)
    {
        $alimRec = AlimentoRecetas::all()->where('alimento_id', '=', $alimento->id);
        foreach ($alimRec as $a) {
            $receta = Receta::all()->find($a);
            foreach ($receta as $r) {
                $nutrientes = Nutriente::all();
                foreach ($nutrientes as $n) {
                    $c = (((AlimentoNutrientes::all()->where('alimento_id', '=', $a->id)->where('nutriente_id', '=', $n->id)->first()->cantidad) * (AlimentoRecetas::all()->where('alimento_id', '=', $a->id)->where('receta_id', '=', $r->id)->first()->peso)) / ($a->pesoUnico));
                    $rn = RecetaNutrientes::all()->where('nutriente_id', '=', $n->id)->where('receta_id', '=', $r->id)->first();
                    $rn->cantidad = $rn->cantidad - $c;
                    $rn->save();
                }
            }
        }

    }

    /**
     * Handle the Alimento "restored" event.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return void
     */
    public function restored(Alimento $alimento)
    {
        //
    }

    /**
     * Handle the Alimento "force deleted" event.
     *
     * @param  \App\Models\Alimento  $alimento
     * @return void
     */
    public function forceDeleted(Alimento $alimento)
    {
        //
    }
}
