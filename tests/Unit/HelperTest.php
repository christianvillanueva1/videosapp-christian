<?php

namespace Tests\Unit;

use App\Helpers\DefaultVideoHelper;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class HelperTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_default_user_and_professor()
    {
        $teamDefaultUser = Team::factory()->create();
        $teamProfessor = Team::factory()->create();

        $defaultUser = createDefaultUser();
        $professorUser = createDefaultTeacher();

        $this->assertNotNull($defaultUser);
        $this->assertNotNull($professorUser);

        $this->assertTrue(Hash::check('password123', $defaultUser->password));
        $this->assertTrue(Hash::check('password123', $professorUser->password));

        $this->assertEquals($teamDefaultUser->id, $defaultUser->current_team_id);
        $this->assertEquals($teamProfessor->id, $professorUser->current_team_id);
    }
    public function test_create_default_video()
    {
        $video = DefaultVideoHelper::createDefaultVideo();

        $this->assertDatabaseHas('videos', [
            'title' => 'Default Video',
            'description' => 'This is a default video',
            'url' => 'https://www.youtube.com/watch?v=gsLvizl5j4E&ab_channel=Mattye',
        ]);

        $this->assertEquals('Default Video', $video->title);
        $this->assertEquals('This is a default video', $video->description);
        $this->assertEquals('https://www.youtube.com/watch?v=gsLvizl5j4E&ab_channel=Mattye', $video->url);

    }
}
