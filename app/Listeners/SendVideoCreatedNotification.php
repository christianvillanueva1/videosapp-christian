<?php

namespace App\Listeners;

use App\Events\VideoCreated;
use App\Models\User;
use App\Notifications\VideoCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Log;

class SendVideoCreatedNotification implements ShouldQueue
{
    public function handle(VideoCreated $event)
    {
        // Verificar los datos del evento
        Log::info('Recibido el evento VideoCreated', ['video' => $event->video]);

        // Obtener los usuarios administradores
        $admins = User::where('super_admin', true)->get();

        if ($admins->isEmpty()) {
            Log::info('No hay usuarios super_admin para recibir la notificación');
        }

        // Enviar la notificación a los administradores
        Notification::send($admins, new VideoCreatedNotification($event->video));

        Log::info('Notificación enviada con éxito');
    }
}
