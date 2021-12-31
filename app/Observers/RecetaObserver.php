<?php

namespace App\Observers;

use App\Models\Alimento;
use App\Models\AlimentoNutrientes;
use App\Models\AlimentoRecetas;
use App\Models\Nutriente;
use App\Models\Receta;
use App\Models\RecetaNutriente;

class RecetaObserver
{
    /**
     * Handle the Receta "created" event.
     *
     * @param  \App\Models\Receta  $receta
     * @return void
     */
    public function created(Receta $receta)
    {

    }

    /**
     * Handle the Receta "updated" event.
     *
     * @param  \App\Models\Receta  $receta
     * @return void
     */
    public function updated(Receta $receta)
    {
        //
    }

    /**
     * Handle the Receta "deleted" event.
     *
     * @param  \App\Models\Receta  $receta
     * @return void
     */
    public function deleting(Receta $receta)
    {

    }

    /**
     * Handle the Receta "restored" event.
     *
     * @param  \App\Models\Receta  $receta
     * @return void
     */
    public function restored(Receta $receta)
    {
        //
    }

    /**
     * Handle the Receta "force deleted" event.
     *
     * @param  \App\Models\Receta  $receta
     * @return void
     */
    public function forceDeleted(Receta $receta)
    {
        //
    }
}
