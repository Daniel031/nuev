<?php

namespace App\Providers;


use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\AlimentoRecetas;
use App\Observers\AlimentoRecetasObserver;
use App\Models\DiaGrupo;
use App\Observers\DiaGrupoObserver;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        AlimentoRecetas::observe(AlimentoRecetasObserver::class);
        DiaGrupo::observe(DiaGrupoObserver::class);
    }
}
