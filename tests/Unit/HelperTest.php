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
        createDefaultUser();
        createDefaultTeacher();

        // Assertions to check if users were created
        $this->assertDatabaseCount('users', 2); // Assuming only 2 default users
        $this->assertDatabaseHas('users', ['email' => 'default_user@example.com']); // Adjust to actual email
        $this->assertDatabaseHas('users', ['email' => 'default_teacher@example.com']); // Adjust accordingly
    }

    public function test_create_default_video()
    {
        DefaultVideoHelper::createDefaultVideo();

        // Assertion to check if the video exists
        $this->assertDatabaseHas('videos', ['title' => 'Life Could Be A Dream']); // Adjust to actual data
    }
}
