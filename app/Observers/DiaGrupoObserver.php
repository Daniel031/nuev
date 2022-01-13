<?php

namespace App\Observers;

use App\Models\DiaGrupo;

class DiaGrupoObserver
{
    /**
     * Handle the DiaGrupo "created" event.
     *
     * @param  \App\Models\DiaGrupo  $diaGrupo
     * @return void
     */
    public function created(DiaGrupo $diaGrupo)
    {
        //
    }

    /**
     * Handle the DiaGrupo "updated" event.
     *
     * @param  \App\Models\DiaGrupo  $diaGrupo
     * @return void
     */
    public function updated(DiaGrupo $diaGrupo)
    {
        //
    }

    /**
     * Handle the DiaGrupo "deleted" event.
     *
     * @param  \App\Models\DiaGrupo  $diaGrupo
     * @return void
     */
    public function deleted(DiaGrupo $diaGrupo)
    {
        //
    }

    /**
     * Handle the DiaGrupo "restored" event.
     *
     * @param  \App\Models\DiaGrupo  $diaGrupo
     * @return void
     */
    public function restored(DiaGrupo $diaGrupo)
    {
        //
    }

    /**
     * Handle the DiaGrupo "force deleted" event.
     *
     * @param  \App\Models\DiaGrupo  $diaGrupo
     * @return void
     */
    public function forceDeleted(DiaGrupo $diaGrupo)
    {
        //
    }
}
