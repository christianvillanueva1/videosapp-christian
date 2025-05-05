<?php

namespace App\Events;

use App\Models\Video;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class VideoCreated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    public $video;
    public function __construct(Video $video)
    {
        $this->video = $video;
    }
    /**
     * Funció que defineix el canal de broadcast
     *
     * @return \Illuminate\Broadcasting\Channel
     */
    public function broadcastOn()
    {
        return new Channel('videos');
    }
    /**
     * Funció per definir el nom de l'event broadcast
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'video.created';  // Nom de l'event que s'enviarà al canal
    }
    /**
     * Opcional: Definir les dades que es transmetran amb el broadcast
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->video->id,
            'title' => $this->video->title,
            'created_at' => $this->video->created_at,
        ];
    }
}
