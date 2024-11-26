<?php

namespace Tests\Feature;

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
        $team = Team::factory()->create();

        $defaultUser = $this->createDefaultUser($team);
        $professorUser = $this->createProfessorUser($team);

        $this->assertNotNull($defaultUser);
        $this->assertNotNull($professorUser);

        $this->assertTrue(Hash::check('password123', $defaultUser->password));
        $this->assertTrue(Hash::check('password123', $professorUser->password));

        $this->assertEquals($team->id, $defaultUser->current_team_id);
        $this->assertEquals($team->id, $professorUser->current_team_id);
    }

    private function createDefaultUser(Team $team)
    {
        return User::create([
            'name' => config('users.default_user.name'),
            'email' => config('users.default_user.email'),
            'password' => Hash::make(config('users.default_user.password')),
            'current_team_id' => $team->id,
        ]);
    }

    private function createProfessorUser(Team $team)
    {
        return User::create([
            'name' => config('users.default_teacher.name'),
            'email' => config('users.default_teacher.email'),
            'password' => Hash::make(config('users.default_teacher.password')),
            'current_team_id' => $team->id,
        ]);
    }
}
