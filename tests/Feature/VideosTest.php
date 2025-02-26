<?php

namespace Tests\Feature\Videos;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Video;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VideosTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        create_permissions();
    }

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

    // Test per a usuaris sense permisos
    public function test_user_without_permissions_can_see_default_videos_page()
    {
        // Crear un usuari sense permisos específics
        $user = User::factory()->create();

        // Realitzar una petició GET a la pàgina per defecte de vídeos
        $response = $this->actingAs($user)->get(route('videos.index'));

        // Verificar que l'usuari pot veure la pàgina de vídeos
        $response->assertStatus(200);
        $response->assertSee('Videos');
    }

    // Test per a usuaris amb permisos
    public function test_user_with_permissions_can_see_default_videos_page()
    {
        // Crear un usuari amb permisos per gestionar vídeos
        $user = User::factory()->create();
        $user->givePermissionTo('manage videos'); // Assignar permís per gestionar vídeos

        // Realitzar una petició GET a la pàgina per defecte de vídeos
        $response = $this->actingAs($user)->get(route('videos.index'));

        // Verificar que l'usuari pot veure la pàgina de vídeos
        $response->assertStatus(200);
        $response->assertSee('Videos');
    }

    // Test per a usuaris no autenticats
    public function test_not_logged_users_can_see_default_videos_page()
    {
        // Realitzar una petició GET a la pàgina per defecte de vídeos sense estar loguejat
        $response = $this->get(route('videos.index'));

        // Verificar que la resposta és exitosa i l'usuari no ha d'estar autenticat
        $response->assertStatus(200);
        $response->assertSee('Videos');
    }
}
