<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\VideoCreated;
use App\Listeners\SendVideoCreatedNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Els esdeveniments de l'aplicació i els seus listeners.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        VideoCreated::class => [
            SendVideoCreatedNotification::class,
        ],
    ];

    /**
     * Registra qualsevol servei relacionat amb els esdeveniments.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Indica si els esdeveniments i listeners s'han de descobrir automàticament.
     *
     * @return bool
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
