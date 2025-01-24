<?php

namespace Database\Seeders;

use App\Helpers\DefaultVideoHelper;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\password;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();

        User::create([
            'name' => 'Test1',
            'email' => 'test1@example.com',
            'password' => bcrypt('test1'),
        ]);
        User::create([
            'name' => 'Test2',
            'email' => 'test2@example.com',
            'password' => bcrypt('test2'),
        ]);

        Video::create([
            'title' => 'Video1',
            'description' => 'This is a default video',
            'url' => 'https://www.youtube.com/watch?v=gsLvizl5j4E&ab_channel=Mattye',
            'published_at' => Carbon::now()->toDateTimeString(),
            'previous' => null,
            'next' => null,
            'series_id' => null
        ]);

        Video::create([
            'title' => 'Video2',
            'description' => 'This is a default video',
            'url' => 'https://www.youtube.com/watch?v=gsLvizl5j4E&ab_channel=Mattye',
            'published_at' => Carbon::now()->toDateTimeString(),
            'previous' => null,
            'next' => null,
            'series_id' => null
        ]);

//        createDefaultTeacher();
//        createDefaultUser();
//        DefaultVideoHelper::createDefaultVideo();

    }
}
