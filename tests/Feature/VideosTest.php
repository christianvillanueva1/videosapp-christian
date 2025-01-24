<?php

namespace Tests\Feature\Videos;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_view_videos()
    {
        // Crear un video en la base de datos
        $video = Video::create([
            'title' => 'Video de prueba',
            'description' => 'Descripción del video',
            'url' => 'https://www.youtube.com/watch?v=gsLvizl5j4E&ab_channel=Mattye',
            'published_at' => Carbon::now(),
        ]);

        // Realizar una petición GET al endpoint de video
        $response = $this->get(route('videos.show', $video->id));

        // Verificar que la respuesta es exitosa y contiene el título del video
        $response->assertStatus(200);
        $response->assertSee($video->title);
    }

    public function test_users_cannot_view_not_existing_videos()
    {
        // Intentar acceder a un video inexistente
        $response = $this->get(route('videos.show', 999));

        // Verificar que se obtiene un error 404
        $response->assertStatus(404);
    }
}
